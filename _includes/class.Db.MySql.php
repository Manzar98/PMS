<?php


class ConnectException extends Exception {}
class QueryException extends Exception {}


class Db 
{
        var $link = null;
  
	function __construct($host, $username, $passwd, $dbname, $port)
	{
		$this->link = mysqli_connect($host . ':' . $port, $username, $passwd);
      
      // print_r($this->link) ;
		/* Throw an error if the connection fails */ 
		if(!$this->link)
		{
				throw new Exception('Cannot connect');   
		}

		if(!mysqli_select_db($this->link,$dbname))
		{
				throw new ConnectException('Cannot select db');
		}
	}
	
	public function query($sql)
	{
            $result = mysqli_query($this->link,$sql); 
            if(mysqli_error($this->link)) {   
                  throw new Exception('Database query error');
            }
            return new DbRowSet($result);
	}
	
	public function QueryArray($sql)
	{
		$result = mysqli_query($this->link,$sql);
		if(!$result) {
		  return false;
		} 
		$array_result = array();
		while ($line = mysqli_fetch_assoc($result))
		{
			$array_result[] = $line;
		}
		unset($result, $line);
		return $array_result;
	}
	
	public function QueryRow($sql)
	{
		$result = mysqli_query($this->link,$sql);
		$line = mysqli_fetch_assoc($result);
		return $line;
	}

	// Runs a query and returns result as a single variable
	public function QueryItem($sql)
	{
	    if(!$this->link) {
	       return false;
	    }
            $result = mysqli_query($this->link,$sql);
            if(!$result) {
                return false;
            }

            $line = mysqli_fetch_row($result);
            if (!$line) {
                return false;
            }
            return $line[0];
        }

        public function Execute($sql)
	{
            $result = mysqli_query($this->link,$sql); 
            if(mysqli_error($this->link)) {
                return false;
            } else {
                return true;
            }
        }
	
	public function GetServerInfo()
	{
		return mysqli_get_server_info();
	}
/*	
	public function ExecuteMultiple($sql)
	{
		$result = parent::multi_query($sql); 
		if(mysqli_error($this) && ENVIRONMENT == 'dev')
		{
			throw new QueryException(mysqli_connect_error(), mysqli_connect_errno()); 
			return false;
		}
		else
		{
			return true;
		}
	}
*/	
	public function real_escape_string($string)
	{
	   return mysqli_real_escape_string($this->link,$string);
	}
	
	public function __get($name)
	{
	   if(isset($this->$name)) {
                return $this->$name;
	   }

	   if(!$this->link) {
	       return null;
	   }

	   switch($name) {
	       case 'insert_id':       return mysqli_insert_id($this->link);
	       case 'affected_rows':   return mysqli_affected_rows($this->link);
	       case 'error':           return mysqli_error($this->link);
	       case 'errno':           return mysqli_errno($this->link);
	       case 'client_info':     return mysqli_get_client_info($this->link);
	       default:                return null;
	   }
	}
}


class DbRowSet {

    var $result;

    function __construct($result) {
        $this->result = $result;
    }

    function fetch_assoc() {
        if($this->result) {
            return mysqli_fetch_assoc($this->result);
        } else {
            return false;
        }
    }
}
?>