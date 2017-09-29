<?php


class UslugiController
{
    public function actionIndex()
    {
        require_once ROOT . '/views/uslugi/index.php';
        return true;
    }

}