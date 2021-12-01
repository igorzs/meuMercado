<?php
require dirname(__FILE__). '/config/config.php';
$product = new Product();

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
}else{
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
}

echo json_encode($result);
?>