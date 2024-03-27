@extends('adminlte::page')
@section('title', 'Productos simples')
@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0 text-dark"></h1>
        <a class="btn btn-primary" href="{{ route('actualizar-ProductosSimples') }}">
            Actualizar Productos
            Simples</a>
    </div>
@stop


@section('content')

    <div class="row">
        <div class="">
            <div class="card">
                <div class="card-header">
                    <h3 class="m-0 text-dark">Productos Simples:</h3>
                </div>
                <div class="card-body">


                    <table class="table table-striped " id="productssimple" style="width: 75%">
                        <thead>
                            <tr>
                                
                             
                                <th> IdProducto </th>
                                <th>CodConfigurable</th>
                                <th>NombreConfigurable</th>
                                <th> VarianteCodigo </th>
                                <th>VarianteNombre_color </th>
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
@endsection



@section('js')
    <script>
        $('#productssimple').DataTable({
            responsive: true,
            autowidth: true,
            select: true,
            
            "ajax": '{{ route('datatable.productosimple') }}',
            "columns": [
                
                {
                    data: 'IdProducto'
                },
                {
                    data: 'CodConfigurable'
                },
                {
                    data: 'NombreConfigurable'
                },

                {
                    data: 'VarianteCodigo'
                },
                {
                    data: 'VarianteNombre_color'
                },
                {
                    data: 'VariantesAtributos'
                },
                {
                    data: 'VarianteCodigo'
                },
                {
                    data: 'MonedaPredeterminada'
                },
                {
                    data: 'PresentacionCodigoTalle'
                },
                {
                    data: 'PresentacionSku'
                },
                {
                    data: 'PresentacionStock'
                },
                {
                    data: 'PresentacionStockDeposito'
                },
                {
                    data: 'PresentacionStockReservado'
                },
                {
                    data: 'PresentacionStockOnOrder'
                },
                {
                    data: 'PresentacionStockInmediato'
                },
                {
                    data: 'PresentacionPrecioVenta_ARS'
                },
                {
                    data: 'PresentacionPrecioVenta_USD'
                },
                {
                    data: 'PresentacionPrecioLista_ARS'
                },
                {
                    data: 'PresentacionPrecioLista_USD'
                },
            ],

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
@endsection
