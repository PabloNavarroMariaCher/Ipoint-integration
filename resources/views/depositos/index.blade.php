@extends('adminlte::page')

@section('title','Sucursales')


 @section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0 text-dark">Sucursales</h1>
            <a class="btn btn-primary" href="{{ route('actualizar-depositos') }}">Actualizar Sucursales</a>    
    </div>
@stop


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <div class="container mt-4">
    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered" id="source">
                <thead>
                    <tr>
                        <th>codigo</th>
                        <th>Nombre</th>                       
                    </tr>
                </thead>
            
            </table>
        </div>
    </div>

                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
   
@stop

@section('js')  
<script>
    $('#source').DataTable({
        responsive: true,
        autowidth: true,
        select: true,
        
        "ajax": '{{ route('datatable.depositos') }}',
        "columns": [
            
            {
                data: 'codigo'
            },
            {
                data: 'nombre'
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



@stop
