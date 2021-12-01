<?php
require dirname(__FILE__). '/config/config.php';
$product = new Product();

$productCod = $_POST['product-cod'];
$productName = $_POST['product-name'];
$productType = $_POST['product-type'];
$productValue = str_replace(',', '.' , $_POST['product-value']);
$productInv = $_POST['product-inventory'];
$resultCod = $product->existCodProduct($productCod);


if($_POST['product-name'] == "" || $_POST['product-type'] == "" || $_POST['product-value'] == "" || $_POST['product-inventory'] == "" ){
    $result = [
        'status' => false,
        'message' => 'Todos os campos são obrigatórios, preencha corretamente'
    ];
}else if($_POST['product-value'] < 0 || $_POST['product-inventory'] < 0){
    $result = [
        'status' => false,
        'message' => 'Valores negativos não são aceitos'
    ];
}else if(count($resultCod) > 0){
    $result = [
        'status' => false,
        'message' => 'Um produto já foi cadastrado com esse código'
    ];
}else{

    
    $product->save($productCod, $productName, $productType, $productValue, $productInv);


    $result = [
        'status' => true,
        'message' => 'Produto cadastrado com sucesso!'
    ];
}
echo json_encode($result);
?>