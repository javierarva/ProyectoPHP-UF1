<?php

    //Returns url route

    function getRoute(): string {

        if(isset($_REQUEST['url'])) {
            $url = $_REQUEST['url'];
        } else {
            $url = 'home';
        }

        switch($url) {
            case 'login':
                return 'login';
            case 'register':
                return 'register';
            case 'login_action':
                return 'login_action';
            case 'register_action':
                return 'register_action';
            case 'dashboard':
                return 'dashboard';
            case 'badlogin':
                return 'badlogin';
            case 'tasks_action';
                return 'tasks_action';
            case 'lists_action';
                return 'lists_action';
            case 'logout';
                return 'logout';
            default:
                return 'home';
        }

    }