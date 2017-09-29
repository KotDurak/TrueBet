<?php


class DevelopController
{
    public function  actionIndex()
    {
        require_once ROOT . '/views/develop/index.php';
        return true;
    }

}