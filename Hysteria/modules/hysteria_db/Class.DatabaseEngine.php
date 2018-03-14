<?php

/*
 * Copyright (C) 2018 Hiro Tsukiyama
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Description of Class
 *
 * @author Hiro Tsukiyama
 */
class DatabaseEngine {

    public $db_host;
    public $db_user;
    public $db_pass;
    public $db_database;
    public $connection;

    public function __construct() {
        
        $c = parse_ini_file('database_info.ini');
        $this->db_host      = $c['host'];
        $this->db_user      = $c['user'];
        $this->db_pass      = $c['password'];
        $this->db_database  = $c['database'];
        
        $DatabaseEngine = $this;
        $DatabaseEngine->connect();
        
    }

    public static function getCredits() {
        
    }
    
    public function connect() {
        //DatabaseEngine::getCredits();
        
        if(!isset($this->connection)) {
            $this->connection = mysqli_connect( $this->db_host, $this->db_user, $this->db_pass, $this->db_database );
        }
        
        if($this->connection === false) {
            // Handle error - notify administrator, log to a file, show an error screen, etc.
            return 'error mess: ' . mysqli_connect_error();
        }
        return $this->connection;
        
    }
    
    public function query($query) {

        $result = $this->connection->query( $query );
        return $result;
        
    }
    
    public static function getNumRows() {
        
    }
    
    public static function getObject() {
        
    }
    
    public static function getList(mysqli_result $result) {
        $data = array();
        while (is_array($line = $result->fetch_assoc())) {
            $data[] = $line;
        }
        return $data;
    }
    
    public static function getObjectList(mysqli_result $result) {
        $data = self::getList($result);
        $data = Common::array2object($data);
        return $data;
    }
    
    public static function getTables() {
        
    }
    
    public static function getColumns($table) {
        
    }

}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



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
