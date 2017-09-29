<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 02.09.2017
 * Time: 19:07
 */

class LivechatController
{
    public function actionIndex()
    {
       require_once ROOT . '/views/livechat/index.php';
        return true;
    }
}