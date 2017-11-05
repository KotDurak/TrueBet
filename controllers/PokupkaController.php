<?php


class PokupkaController
{
    /**
     * Страница покупки
     * @return bool
     */
    public function actionIndex() {
        require_once ROOT . '/views/pokupka/index.php';
        return true;
    }

    /**
     * Страница продолжения покупки
     * @return bool
     */
    public function actionContinue() {
        require_once ROOT . '/views/pokupka/continue.php';
        return true;
    }


    public function actionChat() {
        require_once ROOT . '/views/pokupka/chat.php';
        return true;
    }

}