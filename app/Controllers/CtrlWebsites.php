<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Exceptions\InvalidWebsiteFeedException;
use App\Models\Websites;
use App\Utils\SimplePieManager;
use Exception;
use TypeError;

class CtrlWebsites extends BaseController
{
    public function index()
    {
        return view('pages/websites/index'); 
    }

    public function create(){
        try {
            $websiteUrl = (string) $this->request->getPost('websiteUrl');
            $feed = SimplePieManager::getWebsiteData($websiteUrl); 
            (new Websites())->createWebsite($feed);             
            $response = [
                'title' => 'Registro exitoso', 
                'message' => 'Los datos del sitio han sido guardados correctamente, ¡Continua agregando tus sitios favoritos!', 
                'type' => 'success'
            ];

            return redirect()->to("websites")->with('response', $response); 
        } catch (InvalidWebsiteFeedException $th) {
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
