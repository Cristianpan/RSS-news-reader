<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\News;
use App\Models\CategoriesNews;

class CtrlNews extends BaseController
{
    public function index()
    {
        $news = (new News())->findAll();
        $categories = (new CategoriesNews())->getAllCategoriesOfNews();
        return view('pages/news/index', ['news' => $news, 'categories' => $categories]);
    }
}
