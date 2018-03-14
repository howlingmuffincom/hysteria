<?php

/**
 * Viele Wiederkehrene Methoden
 *
 * @author Gernot Heidemann
 */

class Common
{
	private function __construct()
	{
	}


	public static function timestring2date($timesting, $format = null)
	{
		$tmp_time	= strtotime($timesting);
	
		if(false == $tmp_time)
		{
			return '';
		}
	
		$tmp_format	= 'd.m.Y H:i:s';
		if(!is_null($format))
		{
			$tmp_format = $format;
		}
	
		return date($tmp_format, $tmp_time);
	}


	public static function array2Object(array $array)
	{
		$object	= new stdClass();
		foreach($array as $key => $value)
		{
			if(is_array($value))
			{
				$object->$key	= self::array2Object($value);
			}
			else
			{
				$object->$key	= $value;
			}
		}
		return $object;
	}
}
