<?php

class Application_Model_Helloworld
{
	private $table_name = 'zal';
	
	
    public function saveHello($name)
    {
        return 'Hi ' . $name . '!<br/>';
    }

}

