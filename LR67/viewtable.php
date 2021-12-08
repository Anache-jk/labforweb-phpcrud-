<?php
require_once 'vendor/logicviewtable.php';
?>
<? include('header.php');?>
<div class = "container"><div class = "row"><div class = "col-12">
            <a class="btn btn-primary d-flex justify-content-center m-4" type="button"  href="create.php"><i class = "fa fa-plus m-2"></i>Добавить покойничка</a></div>
            <table class = "table table-striped table-hover m-2">
                <thead class = "thead-light">
                <th>ID</th>
                <th>Фотография</th>
                <th>ФИО</th>
                <th>Тип места</th>
                <th>Дата и время захоронения</th>
                <th>Число присутствовавших</th>
                <th>Выбор действия</th>
                </thead>
                <tbody>
                <?php
                $result = $obj->showData();
                foreach($result as $row):?>
                <tr>
                    <tr>
                        <td><?=$row[0]?></td>
                        <th scope="row"><img src="imgall/deadimg/<?php echo $row[1]?>" class = "imgcheck"></th>
                        <td><?=$row[2]?></td>
                        <th><?=$row[5]?></th>
                        <td><?=$row[3]?></td>
                        <td><?=$row[4]?></td>
                         <td><a href="update.php?id=<?=$row[0]?>" class = "btn btn-success"><i class = "fa fa-edit"></i></a>
                              <a href="delete.php?id=<?=$row[0]?>" class = "btn btn-danger"><i class = "fa fa-trash-alt"></i></a>
                             <a href="read.php?id=<?=$row[0]?>" class = "btn btn-info m-2"><i class="fas fa-book-reader"></i></td>
                </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div></div></div>

<? include('footerscript.php');?>
