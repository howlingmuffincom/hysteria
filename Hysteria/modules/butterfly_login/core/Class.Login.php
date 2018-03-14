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
class LoginEngine {
    
    public $hysteria;
    public $conn;

    public function __construct() 
    {
        if(self::modSelfIni()) 
        {
            $this->connectToHysteria();
        }
    }
    
    public function modSelfIni() 
    {
        $modConfig = parse_ini_file( $_SERVER['DOCUMENT_ROOT'] . '/hysteria/core/config/modules.ini' );
        
        if( $modConfig['butterfly'] == 1 ) 
        {
            return true;
        }
        else 
        {
            return false;
        }
    } 
    
    public function connectToHysteria() 
    {
       // include_once '../../hysteria_db/Class.DatabaseEngine.php';
        $this->hysteria   = new DatabaseEngine();
        $this->conn       = $this->hysteria->connection;

    }
    
    public function tryLogin($username, $password_param) {
        session_start();
        $db = $this->hysteria;

        $password = $password_param;
        $password_encrypted = sha1($password);

        $error = 0;

        $sql = "
        SELECT * FROM `user`
        WHERE   `username` = '" . $username . "'
        AND     `sha1pw`  = '" . $password_encrypted . "'
        AND     `username` != ''
        AND     `sha1pw`  != ''
            ";

        $result = $this->hysteria->query($sql);
        $data = $this->hysteria->getObjectList($result);

        if (mysqli_num_rows($result) != 0) {


            foreach ($data as $value) {
                if ($value->active == 1) {
                    $_SESSION['login'] = 1;
                    $_SESSION['username'] = $value->username;
                }
                else {
                    header("Location: reg.php?error=129");
                }
            }
        }


        if ($error == 1) {
            $_SESSION["user"] = $_REQUEST["username"];
            header("Location: index.php");
        } else {
            header("Location: reg.php?error=1");
        }
    }
    
}