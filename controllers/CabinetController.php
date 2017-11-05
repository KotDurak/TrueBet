<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 29.08.2017
 * Time: 18:48
 */

class CabinetController
{

    public function actionIndex($page = 1)
    {

        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        $prognozes = Prognoz::getAllPrognoz($page);

        $total = Prognoz::getTotalPrognoz();

        $pagination = new Pagination($total,$page, Prognoz::SHOW_BY_DEFAULT, 'page-');

        require_once ROOT . '/views/cabinet/index.php';

        return true;
    }
}