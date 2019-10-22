<?php

namespace Viking\Controllers;

use Viking\Config\DatabaseConfig;
use Viking\Models\Cartorio;
use Viking\Request\Request;
use Viking\Views\View;

/**
 * Classe CartorioController
 */
class CartorioController extends Controller
{

    /**
     * Undocumented function
     *
     * @return void
     */
    public function index()
    {
        $cartorios = Cartorio::findAll();
        View::renderizar('cartorios/index', ['pagetitle' => 'Cartórios', 'cartorios' => $cartorios]);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function dataTables()
    {
        $cartorios = Cartorio::findAll();

        $ob = new \StdClass();
        $ob->data = $cartorios;
        echo json_encode($ob);
    }

    public function dataTablesServerSideProcessing()
    {
        // DB table to use
        $table = Cartorio::getTableName();

        // Table's primary key
        $primaryKey = 'id';

        // Array of database columns which should be read and sent back to DataTables.
        // The `db` parameter represents the column name in the database, while the `dt`
        // parameter represents the DataTables column identifier. In this case simple
        // indexes
        $columns = array(
            array('db' => 'id', 'dt' => 0),
            array('db' => 'nome_cartorio', 'dt' => 1),
            array('db' => 'documento', 'dt' => 2),
            array('db' => 'nome_tabeliao', 'dt' => 3),
            array('db' => 'telefone', 'dt' => 4),
            array('db' => 'email', 'dt' => 5),
            array('db' => 'uf', 'dt' => 6),
            array('db' => 'ativo', 'dt' => 7),
            // array(
            //     'db'        => 'salary',
            //     'dt'        => 5,
            //     'formatter' => function ($d, $row) {
            //         return '$' . number_format($d);
            //     }
            // )
        );

        // SQL server connection information
        $sql_details = array(
            'user' => DatabaseConfig::getUser(),
            'pass' => DatabaseConfig::getPassword(),
            'db'   => DatabaseConfig::getDB(),
            'host' => DatabaseConfig::getHost()
        );


        /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
        * If you just want to use the basic configuration for DataTables with PHP
        * server-side, there is no need to edit below this line.
        */

        require('ssp.class.php');

        echo json_encode(
            SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
        );
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function createForm(Request $request)
    {
        View::renderizar('cartorios/cadastro');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function create(Request $request)
    {
        Cartorio::create($request->getAll());
        header('location: ' . appbaseurl() . '/cartorios');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function updateForm(Request $request, $idCartorio)
    {
        $cartorio = Cartorio::find($idCartorio);
        View::renderizar('cartorios/cadastro', ['cartorio' => $cartorio]);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function update(Request $request)
    {
        $cartorio = Cartorio::find($request->get('id'));
        $cartorio->update($request->getAll());
        header('location: ' . appbaseurl() . '/cartorios');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function delete(Request $request, $idCartorio)
    { }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function uploadXML(Request $request)
    {
        if ((isset($_FILES['arquivo_xml'])) && (is_uploaded_file($_FILES['arquivo_xml']['tmp_name']))) {

            libxml_use_internal_errors(true);
            /* Lê o arquivo XML e recebe um objeto com as informações */
            $xml = simplexml_load_file($_FILES['arquivo_xml']['tmp_name']);
            if (!$xml) {
                redirectWithErrors('cartorios', ['O arquivo xml nâo foi reconhecido!']);
            }

            foreach ($xml as $value) {

                $arrDados = (array) $value;
                $arrDados['nome_cartorio'] = $arrDados['nome'];
                $arrDados['razao_social'] = $arrDados['razao'];
                $arrDados['nome_tabeliao'] = $arrDados['tabeliao'];
                unset($arrDados['nome']);
                unset($arrDados['razao']);
                unset($arrDados['tabeliao']);

                $cartorioCadastrado = Cartorio::where(['razao_social' => $arrDados['razao_social'], 'documento' => $arrDados['documento']])->one();

                if (!empty($cartorioCadastrado)) {
                    $arrDados['id'] = $cartorioCadastrado->id;
                    $cartorioCadastrado->update($arrDados);
                } else {
                    Cartorio::create($arrDados);
                }
            }
        }
    }

    public function exportarParaExcel()
    {
        //declaramos uma variavel para monstarmos a tabela
        $dadosXls  = "";
        $dadosXls .= "  <table border='1' >";
        $dadosXls .= "<th>id</th>";
        $dadosXls .= "<th>nome_cartorio</th>";
        $dadosXls .= "<th>razao_social</th>";
        $dadosXls .= "<th>documento</th>";
        $dadosXls .= "<th>tipo_documento</th>";
        $dadosXls .= "<th>nome_tabeliao</th>";
        $dadosXls .= "<th>telefone</th>";
        $dadosXls .= "<th>email</th>";
        $dadosXls .= "<th>cep</th>";
        $dadosXls .= "<th>endereco</th>";
        $dadosXls .= "<th>bairro</th>";
        $dadosXls .= "<th>cidade</th>";
        $dadosXls .= "<th>uf</th>";
        $dadosXls .= "<th>ativo</th>";

        $cartorios = Cartorio::findAll();
        //varremos o array com o foreach para pegar os dados
        foreach ($cartorios as $cartorio) {
            $dadosXls .= "      <tr>";
            $dadosXls .= '<td>' . $cartorio->id . '</td>';
            $dadosXls .= '<td>' . $cartorio->nome_cartorio . '</td>';
            $dadosXls .= '<td>' . $cartorio->razao_social . '</td>';
            $dadosXls .= '<td>' . $cartorio->documento . '</td>';
            $dadosXls .= '<td>' . $cartorio->tipo_documento . '</td>';
            $dadosXls .= '<td>' . $cartorio->nome_tabeliao . '</td>';
            $dadosXls .= '<td>' . $cartorio->telefone . '</td>';
            $dadosXls .= '<td>' . $cartorio->email . '</td>';
            $dadosXls .= '<td>' . $cartorio->cep . '</td>';
            $dadosXls .= '<td>' . $cartorio->endereco . '</td>';
            $dadosXls .= '<td>' . $cartorio->bairro . '</td>';
            $dadosXls .= '<td>' . $cartorio->cidade . '</td>';
            $dadosXls .= '<td>' . $cartorio->uf . '</td>';
            $dadosXls .= '<td>' . ($cartorio->ativo ? 'Sim' : 'Não') . '</td>';
            $dadosXls .= "      </tr>";
        }
        $dadosXls .= "  </table>";

        // Definimos o nome do arquivo que será exportado  
        $arquivo = "MinhaPlanilha.xls";
        // Configurações header para forçar o download  
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $arquivo . '"');
        header('Cache-Control: max-age=0');
        // Se for o IE9, isso talvez seja necessário
        header('Cache-Control: max-age=1');

        // Envia o conteúdo do arquivo  
        echo $dadosXls;
        exit;
    }
}
