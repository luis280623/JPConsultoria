@extends('Layout.Index')
@section('content')

<div class="container-fluid">
    <br>
    <div class="card" >
        <div class="text-center">
        <h1 class="mt-4">Lista de asesores</h1>
        </div>
        
        <div class="container">

            <div class="row">
                {{-- NUEVO ASESOR --}}
                <div class="text-left col-6 my-3">
                    <a href="{{route('asesores.create')}}" class="btn btn-primary">Agregar Asesor</a>
                </div>
                {{-- BUSCAR POR --}}
                <div class="text-right col-6 my-3">
                    <form class="text-right d-flex ml-auto col-8" method="get" action="{{route('asesores.index')}}">
                        <input class="form-control me-1" type="text" name="buscarpor" placeholder="Buscar" aria-label="Search" value="">
                        <button class="btn btn-success" type="submit">Search</button>
                    </form>
                </div>
            </div>

            {{-- MENSAJE CREATE --}}
            @if (session('mensaje'))
                <div id="mensaje-container" class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('mensaje') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <script>
                    // Esperar 3.5 segundos y ocultar el mensaje
                    setTimeout(function() {
                        document.getElementById('mensaje-container').style.display = 'none';
                    }, 3500);
                </script>
            @endif
            
            {{-- TABLA --}}
            <table class="table text-center">
                <thead class="table-dark ">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Asesor</th>
                        <th scope="col">Celular</th>
                        <th scope="col">Email</th>
                        <th scope="col">Cuenta Bancaria</th>
                        <th scope="col">Cuenta Interbancaria</th>
                        <th colspan="3" class="text-center">Accion</th>
                    </tr>
                </thead>
                <tbody>

                    @if (count($IngArqAsesores)<=0)
                        <tr>
                        <td class="text-center" colspan="7">No hay Registros...</td>
                        </tr>
                    @else
                        @foreach ($IngArqAsesores as $a)
                            <tr>
                                <td>{{$a->Id_Asesor}}</td>
                                <td>{{$a->Nombre}} {{$a->Apellido}}</td>
                                <td>{{$a->celular}}</td>
                                <td>{{$a->Email}}</td>
                                <td>{{$a->CuentaBancaria}}</td>
                                <td>{{$a->CuentaInterbancaria}}</td>
                                <td class="text-right">
                                    <form action="{{route('asesores.destroy',$a->Id_Asesor)}}" method="POST" class="formulario-eliminar">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>

                                <td class="text-left">
                                    <form action="{{route('asesores.edit',$a->Id_Asesor)}}" method="GET" >
                                        <button class="btn btn-warning btn-sm" type="submit"><i class="far fa-user" ></i></button>  
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    @endif
                </tbody>
            </table>
        </div>
    </div>

    

</div>
@endsection

@section('js')
    

    @if (session('datos')== 'OK') 
        <script>
            Swal.fire({
                title: "Eliminado",
                text: "El registro se ha eliminado",
                icon: "success"
            });
        </script>
    @endif

    <script>
        $('.formulario-eliminar').submit(function(e){
            e.preventDefault();

            Swal.fire({
                title: "Estás seguro?",
                text: "El registro se eliminará permanentemente",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, eliminar"
                }).then((result) => {
                if (result.value) {
                    /* Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                    }); */
                    this.submit();
                }
            });
        });
    </script>

    <script>
        
    </script>

@endsection

