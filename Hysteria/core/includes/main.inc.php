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

// includes and prints the HTML Head.
include 'inc/head.php';

$modConfig = parse_ini_file ( $_SERVER['DOCUMENT_ROOT'] . '/hysteria/core/config/modules.ini');

if( $modConfig['hysteria'] == 1 ) {
    // includes the complete Hysteria Library.
    include_once LIB . 'hysteria_db/Class.Evoke.php';
        $hysteria = new Evoke();
        $TemplateEngine = $hysteria->TemplateEngine;
        $DatabaseEngine = $hysteria->DatabaseEngine;
}
if( $modConfig['butterfly'] == 1 ) {
    include_once LIB . 'butterfly_login/core/Class.Evoke.php';
        $butterfly = new EvokeButterfly();
}
if( $modConfig['nightingale'] == 1 ) {
    include LIB . 'nightingale_css/Class.Evoke.php';
    $nightingale = new EvokeNightingale();
}
if( $modConfig['sleepwalker'] == 1 ) {
    
}
if( $modConfig['zombie'] == 1 ) {
    include LIB . 'zombie_template/Class.Evoke.php';
    $zombie = new EvokeZombie();
}

// THIS HAS TO BE THE LAST STATEMENT!
include_once 'inc/footer.php';