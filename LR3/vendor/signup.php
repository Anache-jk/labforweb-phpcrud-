<?
require_once 'connect.php';
$salt = "dfighd@i75.543gtfh/";
$login = $_POST['login'];
$login = htmlspecialchars($login);
$groupblood = (int)$_POST['groupblood'];
$rhfactor = $_POST['rhfactor'];
$rhfactor = htmlspecialchars($rhfactor);
$fioname = $_POST['fioname'];
$fioname = htmlspecialchars($fioname);

$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];
$password = htmlspecialchars($password);
$confirmpassword = htmlspecialchars($confirmpassword);
$arrayerrors = [
    "errfio" => "",
    "errlogin" => "",
    "errpassword" => "",
    "errblood" => "",
    "errRH" => "",
];

if(isset($_POST['register'])){

        $users = $connection->prepare("SELECT * FROM users WHERE login=:login");
        $users->execute([
            'login' => $login,
        ]);

        $usernum = $users->fetchColumn();
    $errors = 0;

        if($usernum>0){
            $arrayerrors['errlogin'] = 'Пользователь с таким логином уже существует';
            $errors++;
        }
        if(filter_var($login, FILTER_VALIDATE_EMAIL)===false || $login === ""){
            $arrayerrors['errlogin'] = 'Невалидный email или заполните поле';
            $errors++;
        }
        if($fioname == ""){
            $arrayerrors['errfio'] = 'Заполните ФИО полностью';
            $errors++;
        }
        if(!$rhfactor || (strcasecmp($rhfactor, "Положительный"))!=0 && (strcasecmp($rhfactor, "положительный"))!=0&& (strcasecmp($rhfactor, "Отрицательный"))!=0 && (strcasecmp($rhfactor, "отрицательный"))!=0){
           echo $rhfactor;
            $arrayerrors['errRH'] = 'Напишите корректно резус-фактор';
            $errors++;
        }
        if($groupblood == ""){
            $arrayerrors['errblood'] = 'Укажите группу крови';
            $errors++;
        }
        if($password != $confirmpassword ){
            $arrayerrors['errpassword'] = 'Пароли не совпадают';
            $errors++;
            }

    if(!preg_match('#^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)#s', $password) || preg_match('#^(?=.*[А-Я])(?=.*[а-я])#s', $password) || strlen($password)<6){
        $arrayerrors['errpassword'] = 'Слишком лёгкий пароль или содержит русские символы';
        $errors++;
    }
    if($password ==''&&$confirmpassword==''){
        $arrayerrors['errpassword'] = 'Задайте пароль';
        $errors++;
    }
        if($errors==0){
            $_SESSION['reg'] = 1;
            header('location: ../autorization.php');
            $password = md5($salt . $password);
            $users = $connection->prepare("INSERT INTO users (id, login, password, firsecthirname, blood_group, rhfactor) VALUES (NULL, :login, :password, :fioname, :groupblood, :rhfactor)");
            $users->execute([
                'login' => $login,
                'password' => $password,
                'fioname' => $fioname,
                'groupblood' => $groupblood,
                'rhfactor' => $rhfactor,
            ]);
        }
    }

