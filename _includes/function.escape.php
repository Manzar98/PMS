<?php

function escape($what)
{
	global $db;
    $array;
	
	if(is_array($what))
	{
		foreach ($what as $variable => $value)
		{
			if (is_string($value) || is_numeric($value))
			{
				$array[$variable] = $db->real_escape_string($value);
			}
			else
			{
				$array[$variable] = $value;
			}
		}
		
	}
	else {
		if (is_string($what) || is_numeric($what))
			{
				$what = $db->real_escape_string($what);
			}
			else
			{
				$what = $what;
			}
	}
	
	return $array;
}
?>