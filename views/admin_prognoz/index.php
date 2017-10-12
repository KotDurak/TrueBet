<?php include ROOT . '/views/layouts/header_admin.php'; ?>
<?php require_once ROOT . '/views/layouts/css.php';?>
<style>
  table tr th{
      color: black;
  }
</style>

<section>
    <div class="container">
        <div class="row">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="/admin">Админпанель</a></li>
                <li class="active">Управление прогнозами</li>
            </ol>
        </div>
            <a href="/admin/product/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить прогноз</a>

            <h4>Список прогнозов</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                <th>ID Прогноза</th>
                <th>Название прогноза</th>
                <th>ЖБ</th>
                <th>Дата</th>
                <th>Описание</th>
                <th>Коэфиицент</th>
                <th>Редактировать</th>
                <th>Удалить</th>
                </tr>
                <?php foreach ($prognozList as $prognoz): ?>
                    <tr>
                        <td><?php echo $prognoz['id']; ?></td>
                        <td><?php echo $prognoz['name']; ?></td>
                        <td><?php echo $prognoz['gb']; ?></td>
                        <td><?php echo $prognoz['date']; ?></td>
                        <td><?php echo $prognoz['id']; ?></td>
                        <td><?php echo $prognoz['coefficent']; ?></td>
                        <td><a href="/admin/product/update/<?php echo $prognoz['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/product/delete/<?php echo $prognoz['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <?php echo $pagination->get(); ?>

        </div>
    </div>
</section>


<?php include ROOT . '/views/layouts/footer_admin.php'; ?>
