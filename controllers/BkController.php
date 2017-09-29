<?php


class BkController
{
  public function actionIndex()
  {
      require_once ROOT . '/views/bk/index.php';
      return true;
  }
}