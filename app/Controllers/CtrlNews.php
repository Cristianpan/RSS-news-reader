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
        $search = (string) $this->request->getGet('search');
        $order = (string) $this->request->getGet('order'); 
        $news = (new News())->getNews($search, $order);
        $categories = (new CategoriesNews())->getAllCategoriesOfNews();
        return view('pages/news/index', ['news' => $news, 'categories' => $categories]);
    }

    public function update()
    {
        try {
            $webSites = (new Websites)->findAll();
            $countUpdateNews = 0;
            $newsModel = new News();
            foreach ($webSites as $webSite) {
                $webSiteId = $webSite['id'];
                $ActualNews = $newsModel->where('websiteId', $webSiteId)->findAll();
                $feed = SimplePieManager::getWebsiteData($webSite['url']);
                $newNews = $feed['news'];
                $oldNews = $newsModel->getOldNews($ActualNews, $newNews);
                if ($oldNews) {
                    $countUpdateNews++;
                    $newNews = $newsModel->getNewNews($ActualNews, $newNews);
                    $newsModel->where('websiteId', $webSiteId)->whereIn('id', $oldNews)->delete();
                    $newsModel->createMultipleNews($newNews, $webSiteId, true);
                }
            }
            UpdateNewsValidator::existOldNews($countUpdateNews);

            $response = [
                'title' => 'Registro exitoso',
                'message' => 'Las noticias han sido actualizado exitosamente. Ahora puedes ver tus nuevas noticias',
                'type' => 'success'
            ];
        } catch (NewsNotFoundException $th) {
            $response = [
                'title' => 'Oops!',
                'message' => $th->getMessage(),
                'type' => 'info',
            ];
        } catch (Exception $th) {
            $response = [
                'title' => 'Oops! Ha ocurrido un error',
                'message' => 'No se han podido guardar los datos del sitio. Por favor intente nuevamente.',
                'type' => 'error',
            ];
        }
        return redirect()->back()->with('response', $response);
    }
}
