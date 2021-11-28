<?php

require dirname(__FILE__). '/config/config.php';
$user = new User();
$emailUser = $_POST['email'];
$passUser = $_POST['pass'];

$existInjection = validaAlphaNumerico($emailUser);

if($existInjection == 0){
    $msg = urlencode("E-mail inválido");
    $pag = "login.php";
}else{

    if(!empty($emailUser) && !empty($passUser)){

        if($user->loginValidate($emailUser, $passUser)){
            $msg = "";
            $pag = "index.php";
        }else{
            $msg = urlencode("Usuário ou senha inválidos");
            $pag = "login.php";
        }

    }else{
        $msg = urlencode("Informe os dados corretamente");
        $pag = "login.php";
    }
}

header("location: $pag". ($msg !== '' ? "?msg=$msg" : ''));
?>