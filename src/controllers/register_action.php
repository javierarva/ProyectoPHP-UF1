<?php

require_once 'db/database.php';
require_once 'lib/conn.php';
require_once 'config.php';

$db = getConnection($dsn, $dbuser, $dbpasswd);

if (($uname = filter_input(INPUT_POST, 'uname')) != null and ($passwd = filter_input(INPUT_POST, 'passwd')) != null 
and ($role = filter_input(INPUT_POST, 'role')) != null and ($email = filter_input(INPUT_POST, 'email')) != null) {
    
    if(register($db, $uname, $passwd, $role, $email)) {
        header('Location: ?url=login');
    } else {
        header('Location: ?url=badlogin');
    }

} 