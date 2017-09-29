<?php


class PrognozController
{
    /**
 * Action для страницы "Prognoz"
 */
    public function actionIndex($page = 1)
    {
        $prognozes = Prognoz::getAllPrognoz($page);

        $total = Prognoz::getTotalPrognoz();

        $pagination = new Pagination($total,$page,Prognoz::SHOW_BY_DEFAULT,'page-');



        require_once  ROOT . '/views/prognoz/index.php';
        return true;
    }

}