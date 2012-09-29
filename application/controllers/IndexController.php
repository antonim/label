<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        
        
        $user = new Application_Model_User();
        $userList = $user->fetchAll();
        print_r($userList->toArray());
    }


}

