<?php
/**
 * Description of PasswordConfirm
 *
 * @author pyatachok
 */
class My_Validator_AlNumExtended extends Zend_Validate_Abstract
{
	const NOT_MATCH = 'notMatch';
	
	protected $_messageTemplates = array(
		self::NOT_MATCH => 'Неверный формат записи.'
	);
	
	public function isValid($value) 
	{
		$value = (string) $value;
		
		if ( preg_match('/\W/', $value) )
		{
			$this->_error(self::NOT_MATCH);
			return false;
		}
		
			return true;
		
		
	}
	
}

