<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 03.10.2017
 * Time: 20:56
 */

class AdminController extends AdminBase
{
    public function actionIndex()
    {
        self::checkAdmin();

        require_once (ROOT . '/views/admin/index.php');
        return true;
    }

    public function actionPrognoz()
    {
        echo "AdminController!";
    }

}