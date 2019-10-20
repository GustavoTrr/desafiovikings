<?php

namespace Viking\Controllers;

use Viking\Auth\Auth;
use Viking\Routes\Routes;
use Viking\Views\View;

/**
 * Classe VikingController
 */
class VikingController extends Controller {
    
    public function inicio()
    {        
        if (Auth::isAuthenticated()) {
            header('location: ' . Routes::getRotaInicialAutenticada());
        } else {
            header('location: ' . Routes::getRotaInicialPublica());
        }
    }

}