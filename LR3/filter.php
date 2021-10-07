<?php
require_once 'vendor/logic.php';
require_once 'vendor/signin.php';
require_once 'header.php';
if($_SESSION['check'] !=1){
    header('location: autorization.php' );
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="/imgall/img/unnamed.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel = "stylesheet" href = "cssfiles/main1.css" type="text/css" >
    <title>Купить памятники Памятник №010 из красного гранита по выгодной цене в Волгограде</title>
</head>
<body class = "position-relative">
<header class = "align-items-center">

<div class = "container">
    <div class="container">
        <div class="d-flex flex-row align-items-center justify-content-between topinfo" >
            <div class="d-flex flex-row justify-content-md-left align-items-center p-2">
                <div class=" text-center font-weight-light p-2">Наши работы
</div >
                <div class=" text-center font-weight-light p-2" >Опт
                </div>
                <div class=" text-center font-weight-light p-2">Как заказать
</div>
                <div class=" text-center font-weight-light p-2">Отзывы</div>

                    </div>

            <div class="d-flex flex-row justify-content-center ">
                <?php

                if($_SESSION['check']){
                    echo "<form method = 'post' class = 'd-flex flex-column'><div class = 'h-1 text-center' style='font-size: 15px'>Вы вошли как: ".$_SESSION['login']."</div><div class = 'w-50 mx-auto'><button name = 'exit' type = 'submit'class = 'btn btn-info buttons' style='color:black'>Выйти</button></div></form>";
                }

                ?>
              </div> </div>
        </div>
    </div>
</div>
   <? echo $head;?>
</header>
<div class = "p-4 container d-flex flex-column justify-content-center">
    <div class = "d-flex justify-content-center">
    <form class = "d-flex flex-column justify-content-center" action="filter.php" method="get">
        <div class = "p-4 m-4 text-center textdop">Фильтрация похорон </div>
        <div class="mb-3 d-flex flex-column justify-content-center">
            <label class = "p-4 text-center">Фильтрация по месту могилы:</label>
                <select name="nameofplace" class="form-control">
                <option value="" selected>Выберите тип</option>
                    <?php
                    foreach($row as $placed):?>

                    <option value = "<?=$placed['id'] ?>"> <?=$placed['name'] ?></option>;;
                  <?php endforeach;?>
            </select>

        </div>
        <div class="mb-3 d-flex flex-column justify-content-center">
            <label class = "p-4 text-center">Фильтрация по ФИО усопшего(их):</label>
            <textarea class="form-control" placeholder="Введите ФИО(или его часть)" name="secondname"></textarea>
        </div>
        <div class="mb-3 d-flex flex-column justify-content-center">
            <label class = "p-4 text-center">Фильтрация по числу присутствовавших:</label>
            <input type="number" name="num_audience" placeholder="Введите количество" value='' class="form-control">
        </div>
        <div class="p-4 d-flex flex-row justify-content-center">
        <input type="submit" value="Применить фильтры" class="m-2 btn btn-success">
        <input type="submit" name="clearfilter" value="Очистить фильтры" class="m-2 btn btn-warning">
        </div>
    </form>
    </div>

    <div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Фото могилы с похорон</th>
                <th scope="col">ФИО усопшего(их)</th>
                <th scope="col">Тип места могилы</th>
                <th scope="col">Дата и время похорон</th>
                <th scope="col">Число присутствовавших</th>
            </tr>
            </thead>
            <tbody>
           <?php foreach($people as $pole):?>
               <tr>
                   <th scope="row"><img src="vendor/imgprotect.php?img=<?php echo $pole[0]?>" class = "imgcheck"></th>
                   <td><?=$pole[1]?></td>
                   <td><?=$pole[4]?></td>
                   <th><?=$pole[2]?></th>
                   <td><?=$pole[3]?></td>

               </tr>
          <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</html>

