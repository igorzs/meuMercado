<?php
require dirname(__FILE__). '/config/config.php';
$productObj = new Product();
$result = $productObj->deleteProduct($_POST['ID']);

echo "Exclusão feita com sucesso!";

?>