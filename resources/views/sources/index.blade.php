@extends('adminlte::page')

@section('title','Sucursales')

@section('content_header')
    <h1 class="m-0 text-dark">Sucursales</h1>
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
                <tbody>
                    @foreach ($sources['data'] as $source )
                    <tr>
                        <td>{{$source['codigo']}}</td>
                        <td>{{$source['nombre']}}</td>
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

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')  
<script> 
$(document).ready( function () {
    $('#source').DataTable();
} );
</script>
@stop
