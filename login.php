<?php
    require dirname(__FILE__). '/config/config.php';

    if(isset($_GET['msg'])){
        $msg = $_GET['msg'];
    }else{
        $msg = '';
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="execlogin.php" method="post">
        <?php 
            if($msg){
                echo "<div class='error-login'><span>$msg</span></div>";
            }
        ?>
        <input name="email" type="text">
        <input name="pass" type="password">
            <input type="submit" value="Enviar">
    </form>
</body>
</html>