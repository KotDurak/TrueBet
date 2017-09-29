<?php


class FaqController
{
    public function actionIndex()
    {
        require_once ROOT . '/views/faq/index.php';
        return true;
    }

}