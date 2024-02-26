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


                    <table class="table table-striped table-bordered" id="productssimple">
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
       
            $('#productssimple').DataTable({
            "ajax": '{{ route('datatable.productosimple') }}',
            "columns":[
            {data: 'IdProducto'},
            {data: 'VarianteCodigo'},
            {data: 'VarianteNombre_color'},
            {data: 'VariantesAtributos'},
            {data: 'VarianteCodigo'},
            {data: 'MonedaPredeterminada'},
            {data:'PresentacionCodigoTalle'},
            {data: 'PresentacionSku'},
            {data:'PresentacionStock'},
            {data: 'PresentacionStockDeposito'},
            {data: 'PresentacionStockReservado'},
            {data: 'PresentacionStockOnOrder'},
            {data: 'PresentacionStockInmediato'},
            {data: 'PresentacionPrecioVenta_ARS'},
            {data: 'PresentacionPrecioVenta_USD'},
            {data: 'PresentacionPrecioLista_ARS'},
            {data: 'PresentacionPrecioLista_USD'},
            ],
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
