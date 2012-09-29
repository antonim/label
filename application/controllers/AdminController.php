<?php

class AdminController extends Zend_Controller_Action
{

    public function init()
    {
        
        $defaultNamespace = new Zend_Session_Namespace();
 
        if (!isset($defaultNamespace->initialized)) {
            echo '123';
        }
        
    }

    public function indexAction()
    {
        
        $user = new Application_Model_User();
        $userList = $user->fetchAll();
        
    }
    
    public function loginAction()
    {
        Zend_Session::regenerateId();
        $defaultNamespace->initialized = true;
    }


}

