<?php
/**
 * Description of Zal
 *
 * @author pyatachok
 */

class Zal extends Operating_Object
{
	protected $db = null;
	protected $table_name = 'zal';
	
	public function __construct()
	{
		parent::__construct();
	}

	function getByAlias($alias)
	{
		$this->db->select(
			'*',
			$this->table_name,
			'alias = ?',
			array($alias),
			'',
			'1'
			);
		return $this->db->fetch_obj();
	}
	
}
