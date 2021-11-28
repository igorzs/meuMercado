<?php
require dirname(__FILE__). '/config/config.php';
$product = new Product();

$fields = array(
    "PRODUCT_NAME" => $_POST['product-name'],
    "PRODUCT_TYPE" => $_POST['product-type'],
    "PRODUCT_VALUE" => str_replace(',', '.',$_POST['product-value']),
    "PRODUCT_INVENTORY" => $_POST['product-inventory'],
    "ID" => $_POST['id']
);

$product->updateProduct($fields);

$result = [
    'status' => true,
    'message' => 'Produto atualizado com sucesso!'
];
echo json_encode($result);
?>