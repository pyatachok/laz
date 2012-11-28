<?php
class My_Database extends Zebra_Database
{

    function fetch_field($field, $default = '', $resource = '')
    {

        // if an active connection exists
        if ($this->_connected()) {

            // if no resource was specified, and a query was run before, assign the last resource
            if ($resource == '' && isset($this->last_result)) $resource = & $this->last_result;

            // if $resource is a valid resource, fetch and return next row from the result set
            if (is_resource($resource)) 
			{
				$assoc = mysql_fetch_assoc($resource);
				return $assoc[$field];
			}
            
            // if $resource is invalid
            else

                // save debug information
                $this->_log('errors', array(

                    'message'   =>  $this->language['not_a_valid_resource'],

                ));

        }

        return $default;

    }

}
