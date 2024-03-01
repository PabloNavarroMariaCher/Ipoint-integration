@extends('adminlte::page')
@section('title', 'Productos Configurables')
@section('content')

    <div class="row p-1">
        <div class="">
            <div class="card">
                <div class="card-header">
                    <h3 class="m-0 text-dark">Productos Configurables:</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered" id="products">
                        <thead>
                            <tr>
                                <th> Id_Producto </th>
                                <th> Codigo </th>
                                <th> Nombre</th>
                                <th> Prioridad </th>
                                <th> FechaCreacion </th>
                                <th> Moneda Predeterminada </th>
                                <th> Impuesto </th>
                                <th> GuiaTalles </th>
                                <th> Fecha creacion ipoint </th>
                                <th> Fecha creacion en laravel </th>
                                <th> Fecha actualizacion en laravel</th>
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
        $('#products').DataTable({
            "ajax": '{{ route('datatable.productoconfigurable') }}',
            "columns": [{
                    data: 'IdProducto'
                },
                {
                    data: 'codigo'
                },
                {
                    data: 'nombre'
                },
                {
                    data: 'prioridad'
                },
                {
                    data: 'fechaCreacion'
                },
                {
                    data: 'monedaPredeterminada'
                },
                {
                    data: 'impuesto'
                },
                {
                    data: 'guiaTalles'
                },
                {
                    data: 'fechaCreacion'
                },
                {
                    data: 'created_at'
                },
                {
                    data: 'updated_at'
                },
            ],
            reponsive: true,
            autowidth: false,
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por pagina",
                "zeroRecords": "Obteniendo datos espere unos segundos.....",
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
