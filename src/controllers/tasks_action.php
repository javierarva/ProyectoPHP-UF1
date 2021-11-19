<?php

require_once 'db/database.php';
require_once 'lib/conn.php';
require_once 'config.php';

$db = getConnection($dsn, $dbuser, $dbpasswd);

if (($task = filter_input(INPUT_POST, 'task')) != null and ($list = filter_input(INPUT_POST, 'listname1')) != null) {

    if(tasks($db, $task, $list)) {
        echo 'Apunte registrado correctamente.';
    } else {
        echo 'Apunte registrado incorrectamente.';
    }
    
}
