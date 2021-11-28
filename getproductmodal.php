<?php
require dirname(__FILE__). '/config/config.php';

$productObj = new Product();
$product = $productObj->getProduct($_POST['ID']);
$productTypes = array(
    0 => "Cerveja",
    1 => "Suco",
    2 => "Refrigerante",
    3 => "Chocolate",
);

echo "<div class='modal-dialog' role='document'>
        <div class='modal-content'>
        <div class='modal-header'>
            <h3 class='modal-title' id='showProductTitle'><b>#".$product['COD']."</b> - ".$product['PRODUCT_NAME']."</h3>
            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
            </button>
        </div>
        <div class='modal-body'>
            <form action='updateproduct.php' id='updateForm' method='POST'>

                <div class='row'>
                    <div class='col-xs-3'>
                        <label>Nome:</label>
                        <input type='text' class='form-control' name='product-name' value='".$product['PRODUCT_NAME']."'>
                    </div>
                    <div class='col-xs-3'>
                        <label>Tipo:</label>
                        <select  class='form-control' name='product-type'>";
                        foreach($productTypes as $key=>$value){
                            $selected = $product['PRODUCT_TYPE'] == $key ? 'selected' : '';
                            echo "<option value='$key' $selected >$value</option>";
                        }
                        echo "</select>
                    </div>
                    <div class='col-xs-3'>
                        <label>Valor:</label>
                        <input type='number'  class='form-control' name='product-value' value='".$product['PRODUCT_VALUE']."'>
                    </div>
                    <div class='col-xs-3'>
                        <label>Estoque:</label>
                        <input type='number'  class='form-control' name='product-inventory' value='".$product['PRODUCT_INVENTORY']."'>
                    </div>
                    <input type='hidden' name='id' id='id-product' value='".$product['ID']."'>
                </div>
            </form>

            
            
        </div>
        <div class='modal-footer'>
            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Fechar</button>
            <button class='btn btn-primary' id='save-product'>Salvar</button>
        </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $( '#save-product' ).click(function() {
                var dados = $('#updateForm').serialize();
                $.ajax({
                    type: 'POST',
                    url: 'updateproduct.php',
                    data: dados,
                    success: function(data){
                        var dataJson = JSON.parse(data);
                        alert(dataJson.message);

                        $('#myProducts').DataTable().ajax.reload();

                        $('#modalProduct').modal('hide');
                    }
                });

            });
        });
    </script>";

?>