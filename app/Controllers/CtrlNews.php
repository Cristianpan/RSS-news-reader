<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Exceptions\NewsNotFoundException;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\News;
use App\Models\CategoriesNews;
use App\Models\Websites;
use App\Utils\SimplePieManager;
use App\Validators\UpdateNewsValidator;
use Exception;

class CtrlNews extends BaseController
{
    public function index()
    {
        $news = (new News())->findAll();
        $categories = (new CategoriesNews())->getAllCategoriesOfNews();
        return view('pages/news/index', ['news' => $news, 'categories' => $categories]);
    }
    public function update(){
            try {
                $webSites = (new Websites)->findAll();
                $countUpdateNews = 0;
                foreach ($webSites as $webSite) {
                    $webSiteId = $webSite['id'];
                    $ActualNews = (new News())->where('websiteId',$webSiteId)->findAll();
                    $feed = SimplePieManager::getWebsiteData($webSite['url']);
                    $newNews = $feed['news'];

                    $oldNews = (new News())->getOldNews($ActualNews, $newNews);
                    print_r($oldNews);
                    if($oldNews){
                        $countUpdateNews++;
                        $newNews = (new News())->getNewNews($ActualNews, $newNews);

                        (new News())->where('websiteId', $webSiteId)->whereIn('id', $oldNews)->delete();
                        (new News())->createMultipleNews($newNews, $webSiteId, true);
                    }
                }
                UpdateNewsValidator::existOldNews($countUpdateNews);

                $response = [
                    'title' => 'Registro exitoso', 
                    'message' => 'Las noticias han sido actualizado exitosamente. Ahora puedes ver tus nuevas noticias', 
                    'type' => 'success'
                ];
                return redirect()->to(url_to("websites"))->withInput()->with('response', $response);  
            } catch (NewsNotFoundException $th) {
                $response = [
                    'title' => 'Oops! Ha ocurrido un error',
                    'message' => $th->getMessage(), 
                    'type' => 'error', 
                ]; 
            } catch (Exception $th){
                $response = [
                    'title' => 'Oops! Ha ocurrido un error',
                    'message' => 'No se han podido guardar los datos del sitio. Por favor intente nuevamente.', 
                    'type' => 'error', 
                ]; 
            }
            return redirect()->to(url_to("websites"))->withInput()->with('response', $response);
        }
    }
