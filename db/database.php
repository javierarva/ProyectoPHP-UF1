<?php

require_once 'config.php';
require_once 'lib/conn.php';

//Autentificación
function auth($db, $email, $passwd):bool {      
    try {   
        $stmt = $db -> prepare('SELECT * FROM users WHERE email=:email LIMIT 1');
        $stmt -> execute([':email'=>$email]);
        $count = $stmt -> rowCount();
        $row = $stmt -> fetchAll(PDO::FETCH_ASSOC);  
              
        if ($count == 1) {       
            $user = $row[0];
            //$res = $_POST['passwd'] == $row[0]['passwd'];
            $res = password_verify($passwd,$user['passwd']);
            
            if ($res) {
                $_SESSION['uname'] = $user['uname'];
                $_SESSION['email'] = $user['email'];
                
                return true;
                
            } else {
                return false;
            }

        } else {
            return false;
        }

    } catch (PDOException $e) {
        return false;
    }
}

function register($db, $uname, $passwd, $role, $email):bool {
    
    if ($uname != null and $passwd != null and $role != null and $email != null) {
        $stmt = $db->prepare("INSERT INTO users(uname, passwd, role, email) VALUES (?, ?, ?, ?)");

        $stmt->bindParam(1, $uname);
        $stmt->bindParam(2, password_hash($passwd, PASSWORD_BCRYPT));
        $stmt->bindParam(3, $role);
        $stmt->bindParam(4, $email);

        $stmt -> execute();

        return true;
    }
    
    return false;
}

function tasks($db, $task, $list):bool {
    
    if ($task != null and $list != null) {
        $stmt = $db->prepare("INSERT INTO tasks(task, list) VALUES (?, ?, ?)");

        $stmt->bindParam(1, $task);
        $stmt->bindParam(2, $list);

        $stmt -> execute();

        return true;
    }
    
    return false;
}

function lists($db, $uname, $listname):bool {
    
    if ($uname != null and $listname != null) {
        $stmt = $db->prepare("INSERT INTO lists(uname, listname) VALUES (?, ?)");

        $stmt->bindParam(1, $uname);
        $stmt->bindParam(2, $listname);

        $stmt -> execute();

        return true;
    }
    
    return false;
}