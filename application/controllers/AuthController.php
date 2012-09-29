<?php
class AuthController extends Zend_Controller_Action
{
 
    public function loginAction()
    {
        
        
 
        $loginForm = new Application_Form_Auth_Login();
 
        if ($this->getRequest()->isPost()) {
            if ($loginForm->isValid($_POST)) {

                
                $db = $this->_getParam('db');
                $adapter = new Zend_Auth_Adapter_DbTable(
                    $db,
                    'users',
                    'login',
                    'password'
                    );

                $adapter->setIdentity($loginForm->getValue('login'));
                $adapter->setCredential(md5($loginForm->getValue('password')));

                $auth   = Zend_Auth::getInstance();
                $result = $auth->authenticate($adapter);

                if ($result->isValid()) {
                    $this->_helper->FlashMessenger('Successful Login');
                    
                    $this->_redirect('/');
                    return;
                }

            }
        }
        
        
 
        $this->view->form = $loginForm;
 
    }
 
}
