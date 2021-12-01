<?php
require dirname(__FILE__). '/config/config.php';

$productTypes = array(
    0 => "Cerveja",
    1 => "Suco",
    2 => "Refrigerante",
    3 => "Chocolate",
);

echo "<div class='modal-dialog' role='document'>
        <div class='modal-content'>
        <div class='modal-header'>
            <h3 class='modal-title' id='showProductTitle'><b>Cadastrar novo produto</h3>
            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
            </button>
        </div>
        <div class='modal-body'>
            <form action='registerproduct.php' id='registerForm' method='POST'>

                <div class='row'>
                    <div class='col-xs-12'>
                        <label>Código do produto:</label>
                        <input type='text' class='form-control' name='product-cod'>
                    </div>
                </div>
                <br>
                <div class='row'>
                    <div class='col-xs-3'>
                        <label>Nome:</label>
                        <input type='text' class='form-control' name='product-name' placeholder'ex.:Skol, Itaipava'>
                    </div>
                    <div class='col-xs-3'>
                        <label>Tipo:</label>
                        <select  class='form-control' name='product-type'>";
                        foreach($productTypes as $key=>$value){
                            echo "<option value='$key'>$value</option>";
                        }
                        echo "</select>
                    </div>
                    <div class='col-xs-3'>
                        <label>Valor:</label>
                        <input type='number'  class='form-control' name='product-value' plaholder='ex.:1,50'>
                    </div>
                    <div class='col-xs-3'>
                        <label>Estoque:</label>
                        <input type='number'  class='form-control' name='product-inventory'>
                    </div>
                </div>
            </form>

            
            
        </div>
        <div class='modal-footer'>
            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Fechar</button>
            <button class='btn btn-primary' id='register-product'>Cadastrar</button>
        </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $( '#register-product' ).click(function() {
                var dados = $('#registerForm').serialize();
                $.ajax({
                    type: 'POST',
                    url: 'registerproduct.php',
                    data: dados,
                    success: function(data){

                        var dataJson = JSON.parse(data);

                        if(dataJson.status){
                            $('#myProducts').DataTable().ajax.reload();
                            $('#modalProduct').modal('hide');
                        }

                        alert(dataJson.message);

                        
                    }
                });

            });
        });
    </script>";


?>