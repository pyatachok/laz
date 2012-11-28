<?php
/**
 * Description of PasswordConfirm
 *
 * @author pyatachok
 */
class My_Validator_PasswordConfirm extends Zend_Validate_Abstract
{
	const NOT_MATCH = 'notMatch';
	
	protected $_messageTemplates = array(
		self::NOT_MATCH => 'Пароли не совпадают.'
	);
	
	public function isValid($value , $context = NULL) 
	{
		$value = (string) $value;
		
		if ( is_array($context) )
		{
			if ( isset($context['password']) && $value == $context['password'] )
			{
				return true;
			}
		}
		elseif (is_string($context) && $value == $context ) 
		{
			return true;
		}
		
		$this->_error(self::NOT_MATCH);
		return false;
	}
	
}

