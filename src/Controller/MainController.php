<?php

namespace App\Controller;

use App\Repository\ClientRepository;
use App\Repository\WorkerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use TCPDF;
use TCPDF_FONTS;

//require_once('../../tcpdf/tcpdf.php');

/**
 * @Route("/main")
 */
class MainController extends AbstractController
{
    /**
     * @Route("/", name="app_main_index", methods={"GET"})
     */
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [

        ]);
    }

    /**
     * @Route("/otchet", name="app_main_otchet", methods={"GET"})
     */
    public function otchet(): Response
    {

        return $this->render('main/otchet.html.twig', [

        ]);
    }

    /**
     * @Route("/otchet/1", name="app_main_otchet_1", methods={"GET"})
     */
    public function otchet1(ClientRepository $clientRepository): Response
    {
        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

        $pdf->SetAuthor('Влад');
        $pdf->setTitle('Отчет-тест');

        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);

        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        $fontname = \TCPDF_FONTS::addTTFfont(__DIR__ . '/../../tcpdf/fonts/myFonts/arial.ttf', '', '', 32, '', 3);
        $pdf->SetFont($fontname, '', 14, '', true);

        $pdf->AddPage();

        $clients = $clientRepository->findAll();

        $tbl ="
<p>Наши клиенты</p>
<table>
    <tr>
       <td>Телефон</td>
       <td>Фамилия</td>
       <td>Имя</td>
       <td>Отчество</td>
    </tr>
    <tr>
       <td>". $clients[0]->getCustomerPhone() ."</td>
       <td>". $clients[0]->getCustomerMiddleName() ."</td>
       <td>". $clients[0]->getCustomerFirstName() ."</td>
       <td>". $clients[0]->getCustomerLastName() ."</td>
    </tr>
    <tr>
       <td>". $clients[1]->getCustomerPhone() ."</td>
       <td>". $clients[1]->getCustomerMiddleName() ."</td>
       <td>". $clients[1]->getCustomerFirstName() ."</td>
       <td>". $clients[1]->getCustomerLastName() ."</td>
    </tr>
    <tr>
       <td>". $clients[2]->getCustomerPhone() ."</td>
       <td>". $clients[2]->getCustomerMiddleName() ."</td>
       <td>". $clients[2]->getCustomerFirstName() ."</td>
       <td>". $clients[2]->getCustomerLastName() ."</td>
    </tr>
    <tr>
       <td>". $clients[3]->getCustomerPhone() ."</td>
       <td>". $clients[3]->getCustomerMiddleName() ."</td>
       <td>". $clients[3]->getCustomerFirstName() ."</td>
       <td>". $clients[3]->getCustomerLastName() ."</td>
    </tr>
</table>
";


        $pdf->writeHTML($tbl, true, false, false, false, '');
        $pdf->Output('otchet_1.pdf', 'I');

        return $this->render('main/otchet1.html.twig', [

        ]);
    }

    /**
     * @Route("/otchet/2", name="app_main_otchet_2", methods={"GET"})
     */
    public function otchet2(WorkerRepository $workerRepository): Response
    {
        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

        $pdf->SetAuthor('Влад');
        $pdf->setTitle('Отчет-тест');

        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);

        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        $fontname = \TCPDF_FONTS::addTTFfont(__DIR__ . '/../../tcpdf/fonts/myFonts/arial.ttf', '', '', 32, '', 3);
        $pdf->SetFont($fontname, '', 14, '', true);

        $pdf->AddPage();

        $workers = $workerRepository->findAll();

        $tbl ="
<p>Наши сотрудники</p>
<table>
    <tr>
       <td>Телефон</td>
       <td>Фамилия</td>
       <td>Имя</td>
       <td>Отчество</td>
    </tr>
    <tr>
       <td>". $workers[0]->getWorkerPhone() ."</td>
       <td>". $workers[0]->getWorkerMiddleName() ."</td>
       <td>". $workers[0]->getWorkerFirstName() ."</td>
       <td>". $workers[0]->getWorkerLastName() ."</td>
    </tr>
    <tr>
       <td>". $workers[1]->getWorkerPhone() ."</td>
       <td>". $workers[1]->getWorkerMiddleName() ."</td>
       <td>". $workers[1]->getWorkerFirstName() ."</td>
       <td>". $workers[1]->getWorkerLastName() ."</td>
    </tr>
    <tr>
       <td>". $workers[2]->getWorkerPhone() ."</td>
       <td>". $workers[2]->getWorkerMiddleName() ."</td>
       <td>". $workers[2]->getWorkerFirstName() ."</td>
       <td>". $workers[2]->getWorkerLastName() ."</td>
    </tr>
    <tr>
       <td>". $workers[3]->getWorkerPhone() ."</td>
       <td>". $workers[3]->getWorkerMiddleName() ."</td>
       <td>". $workers[3]->getWorkerFirstName() ."</td>
       <td>". $workers[3]->getWorkerLastName() ."</td>
    </tr>
</table>
";


        $pdf->writeHTML($tbl, true, false, false, false, '');
        $pdf->Output('otchet_2.pdf', 'I');

        return $this->render('main/otchet2.html.twig', [

        ]);
    }
}