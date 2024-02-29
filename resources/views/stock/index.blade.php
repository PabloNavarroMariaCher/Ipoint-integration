@extends('adminlte::page')

@section('content')

    <div class="row">
        <div class="">
            <div class="card">
                <div class="card-header">
                    <h3 class="m-0 text-dark">Stock Productos:</h3>
                </div>
                <div class="card-body">


                    <table class="table table-striped " id="productssimple" style="width: 75%">
                        <thead>
                            <tr>
                                
                             
                                <th> IdProducto </th>
                                <th>CodConfigurable</th>
                                <th>NombreConfigurable</th>                          
                                <th> PresentacionSku </th>
                                <th> PresentacionStock </th>
                                <th> PresentacionStockDeposito </th>
                                <th> PresentacionStockReservado</th>
                                <th> PresentacionStockOnOrder</th>
                                <th> PresentacionStockInmediato</th>
                                

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
