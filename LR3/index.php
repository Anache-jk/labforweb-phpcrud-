<?php
error_reporting(E_ERROR | E_PARSE);
require_once 'vendor/signin.php';
require_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="imgall/img/unnamed.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel = "stylesheet" href = "cssfiles/main1.css" type="text/css">
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
         <a href = "<? if($_SESSION['check']){ echo 'filter.php';}else{ echo 'autorization.php';} ?>" style="text-decoration: none;font-size: 15px"> ВЗГЛЯНИТЕ НА НАШИ ЛУЧШИЕ РАБОТЫ </a>




            <div class="d-flex flex-row justify-content-end ">
                <?php

                if(!$_SESSION['check']){
                    echo "<div class = 'd-flex flex-column '><div class = 'text-center'><div class='font-weight-bold'>ВЫ НЕ АВТОРИЗОВАНЫ</div><a href='autorization.php'>Войти</a></div><div class = 'text-center'> | или | </div><div><a href='registration.php'>Зарегистрироваться</a></div></div> </div>";
                }
                else{
                    echo "<form method = 'post' class = 'justify-content-center'><div class = 'h-1 text-center' style='font-size: 15px'>Вы вошли как: ".$_SESSION['login']."</div><div class = 'w-50 mx-auto'><button name = 'exit' type = 'submit'class = 'btn btn-info buttons' style='color:black'>Выйти</button></div></form>";
                }

                ?>



        </div>
    </div>
</div>
    <? echo $head;?>
</header>
<div class = "container pl-5" style="background-color: #f5f5f5">
    <div class="d-flex flex-row align-items-center justify-content-between">
<div class = "h2 font-weight-bold container-fluid"> Памятник №010 из красного гранита</div>
        <a href = "#" style="color:black;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-share-fill" viewBox="0 0 16 16">
            <path d="M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5z"/>
        </svg></a>
    </div></div>
<div class = "container pl-5" >
    <div class="d-flex flex-row align-items-center justify-content-between pb-4">
        <div class = "col d-flex flex-row justify-content-center">
            <div class = "col d-flex justify-content-center pt-5" >
                <img src = "https://volgograd.bilkam.ru/upload/resize_cache/iblock/e63/400_400_140cd750bba9870f18aada2478b24840a/e63d12c0280b47abc3d7a98e7c090063.jpg" style="max-height:400px">
</div>
                <div class = "col d-flex flex-column">
                    <div class = "d-flex flex-column">
    <div class = "h4 font-weight-bold text-left pt-5" >
23 580 руб.

</div>
    <p><s>33686 руб.</s></p>
                    <p class = "text-small pb-5"><small class = "settintext">Экономия <mark class = "markst">10 106 руб.</mark> </small></p>
                    </div>
                    <div class = "d-flex flex-column settintext" >
                        <div class = "d-flex flex-column p-1">
                        <p class = "font-weight-light settin" >
                            Размер
                        </p>

                            <div><button type="button" class="btn btn-info settintext">1000*450*50</button></div></div>
                        <div class = "d-flex flex-column p-1">
                        <p class = "font-weight-light settin">
                        Страна производства
                        </p>
                            <div><button type="button" class="btn btn-info settintext" >Китай</button></div></div>
                        <div class = "d-flex flex-column p-1">
                        <p class = "font-weight-light settin" >
                        Полировка стелы
                        </p>
                            <div><button type="button" class="btn btn-info settintext" >5-сторонняя</button></div></div>
                    </div>

                    <div class = "p-2"><button type="button" class="btn btn-outline-primary" >Забронировать</button></div>
<div class = "d-flex flex-row pt-5"><img class = "verymini" src = "imgall/img/tag.png"> <div class = "p-2 h6 font-weight-bold"><a href = "#" class="text-decoration-none" >Скидки 30% на памятники из гранита!</a></div></div>
                    <div class = "d-flex flex-row pt-5 dostavka" ><div class = "p-2d-flex flex-column"><p class = "font-weight">Доставка в г. Волгоград</p>
                    <p class = "adressa" >Вы можете самостоятельно забрать памятник по адресам:</p><p><ul class = "font-weight-bold aviators" >
                            <li>Авиаторов, 17 А</li></ul></p></div>
                        <div class = "p-3"><img class = "trucks"src="imgall/img/truck.png"></div>
                </div>

                </div>

       <div class="d-flex flex-column align-self-start p-4 divmedium">
           <img class = "p-2" src = "https://volgograd.bilkam.ru/upload/iblock/b46/b462ad59f2be92428331e3076ebf8261.jpg">
           <img class = "p-2" src = "https://volgograd.bilkam.ru/upload/iblock/b9b/b9bc2e53c2b2d47238d8f818895913ec.jpg">
           <img class = "p-2" src = "https://volgograd.bilkam.ru/upload/iblock/d44/d44a6590652322da00218643a2efafab.jpg">
       </div>
    </div>
    </div>
<div class = "container d-flex flex-column">
    <div class = "container d-flex flex-row pb-5">
        <div class = "p-3 justify-content-center align-items-center font-weight-bold" ><a class="text-decoration-none"href="#">Описание</a></div>
        <div class = "p-3 justify-content-center align-items-center font-weight-bold" ><a class="text-decoration-none"href="#" >Видео (3)</a></div>
        <div class = "p-3 justify-content-center align-items-center font-weight-bold" ><a class="text-decoration-none"href="#">Задать вопрос</a></div>
    </div>
    <div class = "h5 pt-5 pl-4 font-weight-bold">Характеристики
    </div>

    <div class = "pl-4 pt-5 d-flex flex-column divmini">
    <div class = "d-flex flex-row">
        <div class = "col-1">По форме</div>
        <div class = "col"><hr/></div>
        <div class = "col-1 text-right">Фигурные</div>
        </div>
        <div class = "d-flex flex-row">
            <div class = "col-1">Аксессуары</div>
            <div class = "col"><hr/></div>
            <div class = "col-5 text-decoration-none text-right"><a href="#" class = "text-decoration-none">Бетонная заливка 3/Ч</a>, <a href="#" class = "text-decoration-none">Бетонная заливка 2/Ч</a>,<a href="#" class = "text-decoration-none">Бетонная заливка 1/Ч</a>, <a href="#" class = "text-decoration-none">Красный гранит ваза V4</a></div>
        </div>
        <div class = "d-flex flex-row">
            <div class = "col-1">Категории</div>
            <div class = "col"><hr/></div>
            <div class = "col-3 text-right">Женские, Мужские, Стандарт</div>
        </div>
        <div class = "d-flex flex-row">
            <div class = "col-2">Размер памятника, мм</div>
            <div class = "col"><hr/></div>
            <div class = "col-1 text-right">100*450*50</div>
        </div>
</div>
    </div>
    <div class = "h5 pt-5 pl-5 pb-5 font-weight-bold">Услуги
    </div>
    <div class = "pl-3 pb-5 col d-flex flex-row">
        <div class = "pl-5 pr-4"><img class = "imgmini"src = "https://volgograd.bilkam.ru/upload/iblock/7b4/7b47a6acdeeac7e842a207828cbed6a9.jpg"></div>
    <div class = "col-3 d-flex flex-column" >
        <div class = "font-weight-bold pb-2"><a href = "#" class="text-decoration-none instruct">Уникальное художественное оформление</a></div>
        <div class = "font-weight-light instruct">Выберите уникальное художественное оформление для памятника из более чем 1800 изображений!</div>
    </div>
    </div>
    <div class = "h5 pt-5 pl-5 pb-3 font-weight-bold">Документы
    </div>
    <div class = "pl-3 pb-5 pt-4 col d-flex flex-row">
        <div class = "pl-5 pr-4"><img src = "imgall/img/pdf.png"></div>
        <div class = "col-1 d-flex flex-column" >
            <div><a href = "#" class="text-decoration-none insruct">
                Инструкция по самостоятельной установке l БИЛКАМ</a></div>
            <div class = "font-weight-light megaby"> 4,3 мб
            </div>
        </div>
</div>
    <div class = "h5 pt-5 pl-5 pb-3 text-decoration-underline">С этим товаром заказывают
    </div>
    <div class = "pl-3 pb-5 pt-4 col d-flex flex-row">
        <a href="#"><div class = "p-2 d-flex flex-column font-weight-bold text-center border border-light h6 align-items-center"><img src ="https://volgograd.bilkam.ru/upload/iblock/9d3/9d36f883c08a510d858ae39bd0df073a.jpg"><p>Бетонная заливка 3/Ч</p><p>20 605р.</p></div></a>
        <a  href="#"><div class = " p-2 d-flex flex-column font-weight-bold text-center border border-light h6 align-items-center" ><img src ="https://volgograd.bilkam.ru/upload/iblock/245/2457913a2e9ff2e9ecc0e864cb12d932.jpg"><p>Бетонная заливка 1/Ч</p><p>13 360р.</p></div></a>
        <a  href="#"><div class = " p-2 d-flex flex-column font-weight-bold text-center border border-light h6 align-items-center" ><img src ="https://volgograd.bilkam.ru/upload/iblock/f24/f2499359a9448410ed5e72ffe6d23722.jpg"><p>Бетонная заливка 2/Ч</p><p>16 475р.</p></div></a>

    </div>

</div>
    <div class = "position-fixed p-2" style = "bottom: 20%; right: 0;">
        <div class = "pb-1 mess"><button type="button" class="btn btn-info" ><div class = "d-flex flex-row w-2"> <a href="#"><img src="imgall/img/telephone.png"></a><div class = "pl-4"style = "color:white">Как мы работаем?</div></div></button></div>
        <div class = "pb-1 mess"><button type="button" class="btn btn-info" ><div class = "d-flex flex-row w-2"> <a href="#"><img src="imgall/img/keys.png" style="width: 32px;"></a><div class = "pl-4"style = "color:white">Как мы работаем?</div></div></button></div>
    </div>
<div class = "position-fixed p-2" style = "bottom: 5%; right: 3%;">
    <a href="#"><img src="imgall/img/chat.png"></a>
</div>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</html>