<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Exceptions\NewsNotFoundException;
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
        $page = (int) $this->request->getGet('page');

        $newsModel = new News();
        $news = $newsModel->getNews($search, $order, $page);
        $categories = (new CategoriesNews())->getAllCategoriesOfNews();
        $total = $newsModel->pager->getTotal('news');

        return view('pages/news/index', ['news' => $news, 'total' => $total, 'perPage' => ITEMS_PER_PAGE, 'page' => $page, 'categories' => $categories]);
    }

    public function update()
    {
        try {
            $websites = (new Websites())->findAll();
            $existNewsToUpdate = false; 

            foreach ($websites as $website) {
                $websiteId = $website['id']; 
                $websiteData = SimplePieManager::getWebsiteDataToUpdate($website['url'], strtotime($website['updatedAt']));
                if ($websiteData){
                    $existNewsToUpdate = true; 
                    (new Websites())->updateWebsite($websiteId, $websiteData); 
                }
            }

            UpdateNewsValidator::existOldNews($existNewsToUpdate);

            $response = [
                'title' => 'Actualización exitosa',
                'message' => 'Las noticias han sido actualizadas exitosamente. Ahora puedes ver tus nuevas noticias',
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
