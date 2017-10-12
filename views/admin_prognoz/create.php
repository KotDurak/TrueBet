<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/product">Управление прогнозами</a></li>
                    <li class="active">Редактировать прогноз</li>
                </ol>
            </div>

            <h4>Добавить новый прогноз</h4>

            <?php if(isset($errors) && is_array($errors)): ?>
            <ul>
                <?php foreach($errors as $error): ?>
                    <li> - <?php echo $error; ?> </li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">
                        <p>Название прогноза</p>
                        <input type="text" name="name" >
                        
                        <p>ЖБ</p>
                        <select name="gb">
                            <option value="1">ЖБ</option>
                            <option value="0">0</option>
                        </select>

                        <p>Дата</p>
                        <input type="datetime-local" name="date">

                        <p>Изображение</p>
                        <input type="file" name="image">

                        <p>Описание</p>
                        <textarea name="description">

                        </textarea>
                        <br><br>

                        <p>Коэффицент</p>
                        <input type="text" name="coefficent">

                        <br><br>
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">



                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>
