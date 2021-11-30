<?php
require dirname(__FILE__). '/config/config.php';
$product = new Product();

$productCod = $_POST['product-cod'];
$productName = $_POST['product-name'];
$productType = $_POST['product-type'];
$productValue = str_replace(',', '.' , $_POST['product-value']);
$productInv = $_POST['product-inventory'];

$product->save($productCod, $productName, $productType, $productValue, $productInv);

$result = [
    'status' => true,
    'message' => 'Produto cadastrado com sucesso!'
];

echo json_encode($result);
?>