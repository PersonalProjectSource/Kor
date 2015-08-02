<?php

namespace AppBundle\Services;

use Symfony\Component\HttpFoundation\Session\Session;

class UserAuthentificationService {

    public function IsGranted($oUserRepository, $aUserData) {


        var_dump($oUserRepository->findAll());

die;
        $oSession = new Session();

        $oSession->set('test', 'contenu du test session');

        var_dump($oSession->all());
    }

}