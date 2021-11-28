<?php
    
    require dirname(__FILE__). '/config/config.php';

    $productTypes = array(
        0 => "Cerveja",
        1 => "Suco",
        2 => "Refrigerante",
        3 => "Chocolate",
    );

    try{
        $offset = $_POST['start'];
        $limit = $_POST['length'];
        
        $product= new Product();
        
        $resultProducts = $product->getAllProductsReport($_POST['columns'], $limit, $offset);

        $totalRows = $resultProducts['TOTAL_ROWS'];
        unset($resultProducts['TOTAL_ROWS']);

        for($i =0; $i < count($resultProducts);$i++){

            $resultProducts[$i]['PRODUCT_VALUE'] = 'R$ '. convertCoin($resultProducts[$i]['PRODUCT_VALUE']);

            foreach($productTypes as $key=>$value){
                if((int)$resultProducts[$i]['PRODUCT_TYPE'] == $key){
                    $resultProducts[$i]['PRODUCT_TYPE'] = $value;
                }
            }
        }

        $result['data']= $resultProducts;
        $result['draw'] = $_POST['draw'];
        $result['recordsTotal'] = (int) $totalRows;
        $result['recordsFiltered'] = (int) $totalRows;

    }catch(Exception $e){
        $result['data'] = null;
    }

    header("Content-Type: application/json; charset=UTF-8", true);
    echo json_encode($result);
?>