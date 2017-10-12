<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 03.10.2017
 * Time: 21:00
 */

abstract class AdminBase
{
    public static function checkAdmin()
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        if($user['role'] == 'admin'){
            return true;
        }
        die('Access denied');
    }
}