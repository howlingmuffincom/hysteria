<?php

function TemplateInvoke() {
    $modConfig = parse_ini_file( $_SERVER['DOCUMENT_ROOT'] . '/hysteria/core/config/modules.ini');
    if($modConfig['zombie'] == 1) {
        if (isset($_GET['s'])) {
            $page = $_GET['s'];
            }
            else {
                $page = 'index';
            }
        $TemplateEngine = new ZombieTemplateEngine();
        $TemplateEngine->callSite($page);
    }
    else {
        echo 'Die TemplateEngine ist deaktiviert. Bitte aktivieren Sie "zombie" in core/config/modules.ini<br />';
        echo 'Alternativ können Sie auch die "index.php" im Hauptverzeichnis ändern, indem Sie die Funktion "TemplateInvoke" enfternen.';
    }
}

function printTextFromDB($sql, $field) {
    $DatabaseEngine = new DatabaseEngine();

    $r = $DatabaseEngine->query( $sql );
    $data = DatabaseEngine::getObjectList($r);

    if (mysqli_num_rows($r) != 0) {
        foreach ($data as $value) {
            echo $value->$field;
        }
    }
}

function getObjectFromDB($sql) {
     $modConfig = parse_ini_file( $_SERVER['DOCUMENT_ROOT'] . '/hysteria/core/config/modules.ini');
    if($modConfig['hysteria'] == 1) {
        $DatabaseEngine = new DatabaseEngine();

        $r = $DatabaseEngine->query( $sql );
        $data = DatabaseEngine::getObjectList($r);

        if (mysqli_num_rows($r) != 0) {
            return $data;
        }
        else {
            return false;
        }
    }
    else {
        echo 'Die DatabaseEngine ist deaktiviert. Bitte aktivieren Sie "hysteria" in core/config/modules.ini<br />';
    }
}

function modIni($modName) {
        $modConfig = parse_ini_file( $_SERVER['DOCUMENT_ROOT'] . '/hysteria/core/config/modules.ini');
        if($modConfig[$modName] == 1) {
            return true;
        }
        else {
            return false;
        }
    }