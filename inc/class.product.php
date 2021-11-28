<?php

class Product{

    var $conex;

    var $productTypes = array(
        0 => "Cerveja",
        1 => "Suco",
        2 => "Refrigerante",
        3 => "Chocolate",
    );

    function __construct(){
        $this->conex = new Conex();
    }

    function getProduct($id){
        $sql = "SELECT * FROM TBPRODUCTS WHERE ID = $id";
        $result = $this->conex->executeQuery($sql);
        return $result[0];
    }

    function deleteProduct($id){
        $sql = "DELETE FROM TBPRODUCTS WHERE ID = $id";
        $result = $this->conex->executeQuery($sql);
        return $result;
    }

    function updateProduct($fields){
        $sql = "UPDATE TBPRODUCTS SET PRODUCT_NAME='".$fields['PRODUCT_NAME']."',PRODUCT_TYPE='".$fields['PRODUCT_TYPE']."',PRODUCT_VALUE='".$fields['PRODUCT_VALUE']."',PRODUCT_INVENTORY='".$fields['PRODUCT_INVENTORY']."' WHERE ID =".$fields['ID'];
        $result = $this->conex->executeQuery($sql);
        return $result;
    }

    function getAllProductsReport($filters, $limit, $offset){
        $where = '';
        $conditions = [];

        //FILTROS DEPESQUISA
        foreach($filters as $column){
            switch ($column['data']){

                case 'COD':
                    if ($column['search']['value'] !== '') {
                        $data = str_replace('\\', '', str_replace('.*', '', str_replace('^', '', $column['search']['value'])));
                        $conditions[] = "COD LIKE '%$data%'";
                    }
                    break;

                case 'PRODUCT_NAME':
                    
                    if ($column['search']['value'] !== '') {
                        $data = str_replace('\\', '', str_replace('.*', '', str_replace('^', '', $column['search']['value'])));
                        $conditions[] = "PRODUCT_NAME LIKE '%$data%'";
                    }
                    break;

                case 'PRODUCT_TYPE':
                    if ($column['search']['value'] !== '') {
                        $data = str_replace('\\', '', str_replace('.*', '', str_replace('^', '', $column['search']['value'])));
                        
                        foreach($this->productTypes as $key=>$value){
                            if(strtolower($data) == strtolower($value)){
                                $conditions[] = "PRODUCT_TYPE = $key";
                            }
                        }
                    }
                    break;

                case 'PRODUCT_VALUE':
                    if ($column['search']['value'] !== '') {
                        $data = str_replace('\\', '', str_replace('.*', '', str_replace('^', '', $column['search']['value'])));
                        $data = str_replace(',', '.', $data);
                        $conditions[] = "PRODUCT_VALUE = '$data'";
                    }
                    break;

                case 'PRODUCT_INVENTORY':
                    if ($column['search']['value'] !== '') {
                        $data = str_replace('\\', '', str_replace('.*', '', str_replace('^', '', $column['search']['value'])));
                        $conditions[] = "PRODUCT_INVENTORY = '$data'";
                        
                    }
                    break;

            }
        }

        if (count($conditions) > 0){
            $where = ' WHERE '.implode(' AND ', $conditions);
        }

        $result = [];
        $result['TOTAL_ROWS'] = 0;
        $limitQuery = ' LIMIT ' . $limit . ' OFFSET ' . $offset;

        $sql = "SELECT * FROM TBPRODUCTS $where ".$limitQuery;
        
        $result = $this->conex->executeQuery($sql);
        $result['TOTAL_ROWS'] = count($result);
        return $result;
    }
}
?>