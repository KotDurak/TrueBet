<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админ</a></li>
                    <li><a href="/admin/product">Управление прогнозами</a></li>
                    <li class="active">Редактировать прогноз</li>
                </ol>
            </div>

            <h4>Редактировать прогноз # <?php echo $id; ?></h4>

            <br>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Название прогноза</p>
                        <input type="text" name="name" value="<?php echo $prognoz['name']; ?>">

                        <p>ЖБ</p>
                        <select name="gb">
                            <option value="1" <?php if($prognoz['gb'] == 1) echo 'selected = "selected"';  ?>>ЖБ</option>
                            <option value="0" <?php if($prognoz['gb'] == 0) echo 'selected= "selected"'; ?>>0</option>
                        </select>

                        <p>Дата</p>
                        <input type="text" name="date" value="<?php echo $prognoz['date']; ?>">

                        <p>Изображение</p>
                        <img src="<?php echo Prognoz::getImage($prognoz['id']); ?>" width="200" alt="">
                        <input type="file" name="image" value="<?php echo $prognoz['image']; ?>">

                        <p>Описание</p>
                        <textarea name="description">
                            <?php echo $prognoz['description']; ?>
                        </textarea>

                        <br><br>

                        <p>Коэффицент</p>
                        <input type="text" name="coefficent" value="<?php echo $prognoz['coefficent']; ?>">

                        <br><br>
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>
