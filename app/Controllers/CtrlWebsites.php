<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Exceptions\InvalidWebsiteFeedException;
use App\Exceptions\WebsiteExistsException;
use App\Exceptions\WebsiteNotFoundException;
use App\Models\Websites;
use App\Utils\SimplePieManager;
use App\Validators\WebsiteValidator;
use Exception;

class CtrlWebsites extends BaseController
{
    public function index()
    {
        $websites = (new Websites())->findAll();
        return view('pages/websites/index', ['websites' => $websites]);
    }

    public function create(){
        try {
            $websiteUrl = (string) $this->request->getPost('websiteUrl');
            $feed = SimplePieManager::getWebsiteData($websiteUrl); 

            WebsiteValidator::existWebsite($feed['name']); 

            (new Websites())->createWebsite($feed);             
            $response = [
                'title' => 'Registro exitoso', 
                'message' => 'Los datos del sitio han sido guardados correctamente, ¡Continua agregando tus sitios favoritos!', 
                'type' => 'success'
            ];

            return redirect()->to("websites")->with('response', $response); 
        } catch (InvalidWebsiteFeedException | WebsiteExistsException $th) {
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

    public function delete(){
        try {
            $websiteId = (string) $this->request->getPost('id');
            $foundWebsite = (new Websites()) -> find($websiteId);

            if (!$foundWebsite) {
                throw new WebsiteNotFoundException();
            }

            (new Websites())->delete($websiteId);

            $response = [
                'title' => 'Eliminación exitosa', 
                'message' => 'El sitio web se eliminó con éxito', 
                'type' => 'success'
            ];

            return redirect()->to("websites")->with('response', $response); 
        } catch (\Throwable $th) {
            $response = [
                'title' => 'Oops! Ha ocurrido un error',
                'message' => 'No es posible eliminar el sitio.', 
                'type' => 'error', 
            ]; 
        }
        return redirect()->to(url_to("websites"))->withInput()->with('response', $response); 
    }
}
