<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 29.08.2017
 * Time: 18:48
 */

class CabinetController
{

    public function actionIndex()
    {

        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        require_once ROOT . '/views/cabinet/index.php';

        return true;
    }
}