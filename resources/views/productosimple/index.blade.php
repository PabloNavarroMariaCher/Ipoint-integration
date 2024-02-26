@extends('adminlte::page')
@section('title', 'Productos simple')
@section('content')

    <div class="row">
        <div class="col-12 p-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="m-0 text-dark">Productos Simples:</h3>
                </div>
                <div class="card-body">


                    <table class="table table-striped table-bordered" id="products">
                        <thead>
                            <tr>
                                <th> IdProducto </th>
                                <th> VarianteCodigo </th>
                                <th> VarianteNombre_color</th>
                                <th> VariantesAtributos </th>
                                <th> VarianteCodigo </th>
                                <th> Moneda Predeterminada </th>
                                <th> PresentacionCodigoTalle </th>
                                <th> PresentacionSku </th>
                                <th> PresentacionStock </th>
                                <th> PresentacionStockDeposito </th>
                                <th> PresentacionStockReservado</th>
                                <th> PresentacionStockOnOrder</th>
                                <th> PresentacionStockInmediato</th>
                                <th> PresentacionPrecioVenta_ARS</th>
                                <th> PresentacionPrecioVenta_USD</th>
                                <th> PresentacionPrecioLista_ARS</th>
                                <th> PresentacionPrecioLista_USD</th>

                            </tr>
                        </thead>

                        <tbody>
                           <th> IdProducto </th>
                                <th> VarianteCodigo </th>
                                <th> VarianteNombre_color</th>
                                <th> VariantesAtributos </th>
                                <th> VarianteCodigo </th>
                                <th> Moneda Predeterminada </th>
                                <th> PresentacionCodigoTalle </th>
                                <th> PresentacionSku </th>
                                <th> PresentacionStock </th>
                                <th> PresentacionStockDeposito </th>
                                <th> PresentacionStockReservado</th>
                                <th> PresentacionStockOnOrder</th>
                                <th> PresentacionStockInmediato</th>
                                <th> PresentacionPrecioVenta_ARS</th>
                                <th> PresentacionPrecioVenta_USD</th>
                                <th> PresentacionPrecioLista_ARS</th>
                                <th> PresentacionPrecioLista_USD</th>

                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $('#products').DataTable({
            reponsive: true,
            autowidth: true,
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por pagina",
                "zeroRecords": "Nada encontrado Mil disculpas",
                "info": "Mostrando la pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search": "Buscar:",
                "paginate": {
                    'next': "Siguiente",
                    'previous': "Anterior",
                }


            }
        });
    </script>
@stop
