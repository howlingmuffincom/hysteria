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
class Evoke {
    
    public $TemplateEngine;
    public $DatabaseEngine;
    
    public function __construct() {
        include_once 'Class.Main.php';
        include_once 'Class.TemplateEngine.php';
        include_once 'Class.DatabaseEngine.php';
        $this->evokeAll();
    }
    
    public function evokeAll() {
        $main = new Main();
        $template = new TemplateEngine();
        $this->TemplateEngine = $template;
        
        $dbEngine = new DatabaseEngine();
    }
}
