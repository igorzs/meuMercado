<?php
    require dirname(__FILE__). '/config/config.php';

    if(isset($_GET['msg'])){
        $msg = $_GET['msg'];
    }else{
        $msg = '';
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercado</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <form action="execlogin.php" method="post">
        <?php 
            if($msg){
                echo "<div class='error-login', style='color:red'><span>$msg</span></div>";
            }
        ?>
        <h2>Login</h2>
        <h4>Meu Mercado</h4>
        <input name="email" type="text" placeholder="Digite o Email" required autofocus>
        <input name="pass" type="password" placeholder="Digite a Senha" required>
        <input type="submit" value="Acessar">
    </form>

</body>
</html>