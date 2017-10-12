<?php

/**
 * Контроллер AdminCategoryController
 * Управление категориями товаров в админпанели
 */
class AdminProductController extends AdminBase
{

    /**
     * Action для страницы "Управление категориями"
     */
    public function actionIndex($page = 1)
    {
        // Проверка доступа
        self::checkAdmin();

        $prognozList = Prognoz::getAllPrognoz($page);
        $total = Prognoz::getTotalPrognoz();

        $pagination = new Pagination($total,$page,Prognoz::SHOW_BY_DEFAULT,'page-');

        require_once (ROOT . '/views/admin_prognoz/index.php');
        return true;
    }



    public function actionUpdate($id)
    {
        self::checkAdmin();

        $prognoz = Prognoz::getPrognozById($id);

        if(isset($_POST['submit'])){
            $options['name'] = $_POST['name'];
            $options['gb'] = $_POST['gb'];
            $options['date'] = $_POST['date'];
            $options['description'] = $_POST['description'];
            $options['coefficent'] = $_POST['coefficent'];

            if(Prognoz::updatePrognozById($id,$options)){
                if(is_uploaded_file($_FILES["image"]["tmp_name"])){
                    move_uploaded_file($_FILES['image']['tmp_name'],$_SERVER['DOCUMENT_ROOT'] . "/uploads/itemsimg/{$id}.jpg");
                }
            }

            header("Location: /admin/product");

        }
        require_once (ROOT . '/views/admin_prognoz/update.php');
       return true;
    }


    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем категорию
            Prognoz::deleteCategoryById($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/product");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_prognoz/delete.php');
        return true;
    }

    public function actionCreate()
    {
        self::checkAdmin();

        if(isset($_POST['submit'])){
            $options['name'] = $_POST['name'];
            $options['gb'] = $_POST['gb'];
            $options['date'] = $_POST['date'];
            $options['description'] = $_POST['description'];
            $options['coefficent'] = $_POST['coefficent'];

            $errors = false;

            if(!isset($options['name']) || empty($options['name'])){
                $errors[] = 'Заполните поля';
            }

            if($errors == false){
                $id = Prognoz::createPrognoz($options);

                if($id){
                    if(is_uploaded_file($_FILES["image"]["tmp_name"])){
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/uploads/itemsimg/{$id}.jpg");
                    }
                }
                header("Location: /admin/product");
            }
        }

        require_once ROOT . '/views/admin_prognoz/create.php';
        return true;
    }

}
