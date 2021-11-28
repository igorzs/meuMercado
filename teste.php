<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.11.3/r-2.2.9/datatables.min.js"></script>
</head>
<body>

<table class="table table-bordered" id="myProducts" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Nome</th>
                                            <th>Tipo</th>
                                            <th>Valor</th>
                                            <th>EStoque</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>




    <script>

        $(document).ready(function(){
            var myProducts = $('#myProducts').dataTable({
                dom:"<'row'<'col-sm-10 col-md-10'l><'col-sm-2 col-md-2 d-flex flex-row-reverse'B>>" +
                                            "<'row'<'col-sm-12'tr>>" +
                                            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",

                pageLength: 10,
                ordering: false,
                processing: true,
                serverSide: true,
                deferRender: true,
                ajax: {
                    url: './myproductsgrid.php',
                    type: "POST",
                },
                dataSrc: 'data',
                columns: [{
                        data: "COD",
                        className: "searchable",
                        width: '10'
                    },
                    {
                        data: "PRODUCT_NAME",
                        className: "searchable"
                    },
                    {
                        data: "PRODUCT_TYPE",
                        className: "searchable"
                    },
                    {
                        data: "PRODUCT_VALUE",
                        className: "searchable"
                    },
                    {
                        data: "PRODUCT_INVENTORY",
                        className: "searchable"
                    },
                    {
                        className: 'product-action',
                        defaultContent: '',
                        data: null,
                        orderable:false
                    }
                ],
                createdRow: function(row,data,index){
                    $('.product-action', row).html('<button>Ações</button>');

                },
                initComplete: function() {
                    // Aplica o campo de busca nas colunas
                    this.api().columns().every(function(index) {
                        var that = this;
                        // verifica se a coluna tem habilitada a pesquisa
                        if (this.header().className.indexOf('searchable') !== -1) {
                            $('input', this.header()).on('blur clear change', function() {
                                if (that.search() !== this.value) {
                                    that.search(this.value).draw();
                                }
                            });

                        }});
                },

                language: {
                    "sEmptyTable": "Nenhum registro encontrado",
                    "sInfo": "Mostrando de _START_ at&eacute; _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 at&eacute; 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ resultados por p&aacute;gina",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sSearch": "Pesquisar",
                    "oPaginate": {
                        "sNext": "Pr&oacute;ximo",
                        "sPrevious": "Anterior",
                        "sFirst": "Primeiro",
                        "sLast": "&Uacute;ltimo"
                    },
                    "oAria": {
                        "sSortAscending": ": Ordenar colunas de forma ascendente",
                        "sSortDescending": ": Ordenar colunas de forma descendente"
                    },
                    decimal: ",",
                    thousands: ".",
                    buttons: {
                        copy: 'Copiar',
                        copyTitle: 'Copiado com sucesso!',
                        copySuccess: {
                            _: '%d linhas copiadas',
                            1: '1 linha copiada'
                        }
                    }
                }


            });

            $('#myProducts thead th').each(function() {

                if ($(this).hasClass('searchable')) {

                    inputType = 'text';

                    // se tem a class datepicker o input será do tipo "DATE"
                    if ($(this).hasClass('datepicker')) {
                        inputType = 'date';
                    }

                    $('<br><input class="form-control form-control-sm clearable" type="' + inputType + '">').appendTo(this);
                }
            });
        });

        function tog(v) {
            return v ? "addClass" : "removeClass";
        }
        $(document).on("input", ".clearable", function() {
            $(this)[tog(this.value)]("x");
        }).on("mousemove", ".x", function(e) {
            $(this)[tog(this.offsetWidth - 18 < e.clientX - this.getBoundingClientRect().left)]("onX");
        }).on("touchstart click", ".onX", function(ev) {
            ev.preventDefault();
            $(this).removeClass("x onX").val("").change();
        });

        function showProduct(idProduct){
            $.post("getproductmodal.php", {
                "ID": idProduct
            }, function(data) {
                $("#showProduct").html(data);
                $("#showProduct").modal('show');
            });
        }
    </script>

<div class="container">
  <h2>Here is how to load a bootstrap modal as soon as the document is ready </h2>
  <!-- Trigger the modal with a button -->


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

<script>
$(document).ready(function(){
   $("#myModal").modal();
});
</script>
<?php
        require dirname(__FILE__). '/assets_js.php';
    ?>
</body>
</html>