<?php

namespace App\Controller;

use GuzzleHttp\Client;
use GuzzleHttp\Cookie\SessionCookieJar;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Response;


/**
 * ProtocoloController.
 *
 * @Route("/protocolo")
 */
class ProtocoloController extends AbstractController
{

    /**
     *
     * @Route("/", name="protocolo_index")
     * @Method("GET")
     * @IsGranted("ROLE_USER")
     */
    public function indexAction() {

        $cliente = GuzzleController::getGuzzleClient();
        $x=GuzzleController::getToken();

        return $this->render('protocolo/configuracion.html.twig', [
            'number' => $x,
        ]);
    }

    /**
     *
     * @Route("/getProcess", name="get_process")
     * @Method("GET")
     * @IsGranted("ROLE_USER")
     */
    public function getProcessId(){
        print_r(GuzzleController::doTheRequest('GET', 'API/bpm/process?s=Proceso'));
    }



}