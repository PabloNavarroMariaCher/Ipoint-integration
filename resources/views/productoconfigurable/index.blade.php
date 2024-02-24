@extends('adminlte::page')
@section('title','Productos Configurables')
@section('content')

<div class="row p-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h3 class="m-0 text-dark">Productos Configurables:</h3>
            </div>
            <div class="card-body">
                <div class="container mt-4">
                    <div class="row">
                        <div class="col">
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
                                        <th> ultima actualizacion </th>
                                        
                                    </tr>
                                </thead>
                              
                             
                                <tbody>
                                    @foreach ($products as $item)
                                    <tr>
                                        <td>{{ $item["IdProducto"] }}</td>
                                        <td>{{ $item["codigo"] }}</td>
                                        <td>{{ $item["nombre"] }}</td>
                                        <td>{{ $item["prioridad"] }}</td>
                                        <td>{{ date('d-m-Y', strtotime($item["fechaCreacion"])) }}</td>
                                        <td>{{ $item["monedaPredeterminada"] }}</td>
                                        <td>{{ $item["impuesto"] }}</td>
                                        <td>{{ $item["guiaTalles"] }}</td>
                                        <td>{{ $item["updated_at"] }}</td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
 
@stop

    @section("css")
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