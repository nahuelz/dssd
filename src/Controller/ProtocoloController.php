<?php

namespace App\Controller;

use App\Form\Type\ConfigurarProtocoloType;
use GuzzleHttp\Client;
use GuzzleHttp\Cookie\SessionCookieJar;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Protocolos;



/**
 * ProtocoloController.
 *
 * @Route("/protocolo")
 */
class ProtocoloController extends AbstractController
{

    /**
     *
     * @Route("/token", name="protocolo_index")
     * @Method("GET")
     * @IsGranted("ROLE_USER")
     */
    public function indexAction() {

        $cliente = GuzzleController::getGuzzleClient();
        echo GuzzleController::getToken();
    }

    /**
     *
     * @Route("/configurar", name="protocolo_configurar")
     * @Method("GET")
     * @IsGranted("ROLE_USER")
     */
    public function configurarAction(Request $request){
        if ($request->query->get('id') != '') {
            $idTarea = $request->query->get('id');
        } else {
            $idTarea = "No se paso bien el id";
        }

        // just setup a fresh $task object (remove the example data)
        $protocolo = new Protocolos();
        $protocolo->setNombre('nombreProtocolo');
        $protocolo->setIdTarea($idTarea);

        $form = $this->createForm(ConfigurarProtocoloType::class, $protocolo);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $method = 'POST';
                $uri = 'API/bpm/userTask/'.$protocolo->geTIdTarea().'/execution';
                $client = GuzzleController::getGuzzleClient();
                $request = $client->request($method, $uri,
                    [
                        'headers' => [
                            'X-Bonita-API-Token' => GuzzleController::getToken()
                        ],
                        'json' => [
                            'contratoProtocolo' => [
                                'nombreProtocolo' => $protocolo->getNombre()
                            ],
                        ]
                    ]);

            } catch (RequestException $e) {
                if ($e->hasResponse()) {
                    $error = Psr7\str($e->getResponse());
                } else {
                    $error = "No se puede conectar al servidor de Bonita OS";
                }

                return $error;
            }
            echo GuzzleController::getToken();

            die();

            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            //$protocolo = $form->getData();

            //print_r($protocolo->geTIdTarea()); die();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            // $entityManager = $this->getDoctrine()->getManager();
            // $entityManager->persist($task);
            // $entityManager->flush();

            //return $this->redirectToRoute('task_success');
        }

        return $this->render('protocolo/configuracion.html.twig', [
            'idTarea' => $idTarea, 'form' => $form->createView(),
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