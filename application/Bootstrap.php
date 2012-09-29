<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
//    protected function _initDoctype()
//    {
//        $this->bootstrap('view');
//        $view = $this->getResource('view');
//        $view->doctype('XHTML1_STRICT');
//    }
    
    
    private function _createRoles($acl)
    {
        $acl->addRole(new Zend_Acl_Role('guest'));
        $acl->addRole(new Zend_Acl_Role('staff'), 'guest');
        $acl->addRole(new Zend_Acl_Role('editor'), 'staff');
        $acl->addRole(new Zend_Acl_Role('marketing'), 'staff');
        $acl->addRole(new Zend_Acl_Role('administrator'));
    }

    private function _createRules($acl)
    {
        $acl->allow('guest', null, 'view');
        $acl->allow('staff', null, array('edit', 'submit', 'revise'));
        $acl->allow('editor', null, array('publish', 'archive', 'delete'));
        $acl->allow('administrator');

        $acl->allow('marketing', array('newsletters', 'latest news'),
            array('publish', 'archive'));
        $acl->deny('staff', 'latest news', 'revise');
        $acl->deny(null, 'announcements', 'archive');
    }

    
}

