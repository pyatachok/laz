<?php

class HelloworldController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function helloAction()
    {
        $helloString = "step1: Hello World!<br/>";
        echo $helloString;
        
        $helloWorldModel = new Application_Model_Helloworld();
        echo 'step2: ' . $helloWorldModel->saveHello('Piglet');
        
        $helloWorldModel = new Application_Model_Helloworld();
        $this->view->hellostring = 'step3: ' . $helloWorldModel->saveHello('Piglet');
		$dir = $this->_getParam('dir', '/');
		$files = scandir($dir);
		
		
		$this->view->files = $files;
    }


	
}



