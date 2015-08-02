<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


class DefaultController extends Controller
{
    /**
     * Entree de l'application.
     * Recoit les données de connexion user.
     * Envoi les données de la page d'accueil.
     *
     * @Route("/", name="homepage")
     * @Method("POST")
     */
    public function indexAction(Request $oRequest)
    {

        $oUserRepository = $this->getDoctrine()->getManager()
                                    ->getRepository("AppBundle:User");
        $aDataFromJson = json_decode($oRequest->getContent());
        $aAuthResult = $this->container->get('user.authentification')
                                ->isGranted($oUserRepository, $aDataFromJson);

        // Authorisation de l'utilisateur.
            // - Recuperation des données utilisateurs et stokage en session.
            // - Gestion des ustilisateurs avec Fos UserBundle.


        //Recuperation des données liées a l'utilisateur.
        //Envoi des données en json.

        $oResponse = new JsonResponse();
        $oResponse->setData($aDataFromJson);
        return $oResponse;
    }
}
