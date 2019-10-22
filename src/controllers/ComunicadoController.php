<?php

namespace Viking\Controllers;

use Viking\Mail\Mailer;
use Viking\Models\Cartorio;
use Viking\Request\Request;
use Viking\Views\View;

/**
 * Classe ComunicadoController
 */
class ComunicadoController extends Controller {
    
    /**
     * Undocumented function
     *
     * @return void
     */
    public function comunicadoForm()
    {
        echo View::renderizar('comunicados/index');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function enviarEmail(Request $request)
    {
        $mensagem = $request->get('text');
        $assunto = 'Comunicado Vikings';
        $cartorios = Cartorio::findAll();
        $arrEmails = array_filter(array_column($cartorios, 'email'));

        if (Mailer::enviarEmail($arrEmails, $assunto, $mensagem)) {
            $status = true;
        } else {
            $status = false;
            $errors = ['Houve algum problema ao tentar enviar os emails.'];
        }

        return json_encode([
            'status' => $status,
            'errors' => $errors ?? []
        ]);
    }

}