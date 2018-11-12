<?php


class ConnectException extends Exception {}
class QueryException extends Exception {}

class Db extends mysqli
{
	function __construct($host, $username, $passwd, $dbname, $port)
	{
		parent::__construct($host, $username, $passwd, $dbname, $port);

	    /* Throw an error if the connection fails */ 
		if(mysqli_connect_error() && ENVIRONMENT == 'dev')
		{
			throw new ConnectException(mysqli_connect_error(), mysqli_connect_errno()); 
		} 
	}
	
	public function query($query)
	{
		$result = parent::query($query); 
	  if(mysqli_error($this) && ENVIRONMENT == 'dev')
		{
			throw new QueryException(mysqli_error($this), mysqli_errno($this)); 
		}
		return $result;
	}
	
	public function QueryArray($query)
	{
		$result = parent::query($query); 
		$array_result = array();
		while ($line = mysqli_fetch_array($result, mysqli_ASSOC))
		{
			$array_result[] = $line;
		}
		unset($result, $line);
		return $array_result;
	}
	
	public function QueryRow($query)
	{
		$result = parent::query($query);
		$line = mysqli_fetch_array($result, mysqli_ASSOC);
		return $line;
	}

	

	// Runs a query and returns result as a single variable
	public function QueryItem($query)
	{
		$result = parent::query($query);
		$line = mysqli_fetch_array($result, mysqli_NUM);
		if ($line)
		{
			return $line[0];
		}
		return false;
	}
	
	public function Execute($query)
	{
		$result = parent::query($query); 
	  if(mysqli_error($this))
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	
	public function GetServerInfo()
	{
		return $this->server_info;
	}
	
	public function ExecuteMultiple($query)
	{
		$result = parent::multi_query($query); 
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
}
?>