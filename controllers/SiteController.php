<?php


class SiteController
{
    public function actionIndex()
    {

        $prognozes = Prognoz::getNumberPrognoz(5);
        $total = 5;

        require_once ROOT . '/views/site/index.php';
        return true;
    }

    public function actionIndexpsite() {}

    public function actionIndexcsite() {}

}