<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


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
     */
    public function indexAction() {

        $cliente = GuzzleController::getGuzzleClient();
        print_r(GuzzleController::getToken());
        die();

        return $this->render('protocolo/configuracion.html.twig', [
            'x' => $x,
        ]);
    }

}