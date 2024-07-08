@extends('Layout.Index')
@section('content')
    

<div class="container-fluid">
    {{-- SCRIPT PARA FECHA --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<br>
    <form action="{{route('asesores.update',$IngArqAsesores->Id_Asesor)}}" method="POST">
        @csrf
        @method('put')
        <div class="card my-2 mx-5" >
            <div class="my-4 mx-4">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="..." class="img-fluid rounded-start" alt="...">
                    </div>

                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label for="a" class="form-label">Nombres</label>
                                    <input type="text" class="form-control" name="Nombre" value="{{old('Nombre',$IngArqAsesores->Nombre)}}">
                                </div>
    
                                <div class="mb-3 col-6">
                                    <label for="a" class="form-label">Apellidos</label>
                                    <input type="text" class="form-control" name="Apellido" value="{{old('Apellido',$IngArqAsesores->Apellido)}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label for="a" class="form-label">Cuenta Bancaria</label>
                                    <input type="text" class="form-control" name="CuentaBancaria" value="{{old('CuentaBancaria',$IngArqAsesores->CuentaBancaria)}}">
                                </div>
    
                                <div class="mb-3 col-6">
                                    <label for="a" class="form-label">Cuenta Interbancaria</label>
                                    <input type="text" class="form-control" name="CuentaInterbancaria" value="{{old('CuentaInterbancaria',$IngArqAsesores->CuentaInterbancaria)}}">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label for="a" class="form-label">Email</label>
                                    <input type="email" class="form-control" aria-describedby="emailHelp" name="Email" value="{{old('Email',$IngArqAsesores->Email)}}">
                                </div>
    
                                <div class="mb-3 col-3">
                                    <label for="a" class="form-label">Celular</label>
                                    <input type="text" class="form-control" name="celular" value="{{old('celular',$IngArqAsesores->celular)}}">
                                </div>

                                <div class="mb-3 col-3">
                                    <label for="a" class="form-label">Dni</label>
                                    <input type="text" class="form-control" name="Dni" value="{{old('Dni',$IngArqAsesores->Dni)}}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-3">
                                    <label for="a" class="form-label">Departamento</label><br>
                                    <select class="form-control" aria-label="Default select example">
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
    
                                <div class="mb-3 col-3">
                                    <label for="a" class="form-label">Provincia</label><br>
                                    <select class="form-control" aria-label="Default select example">
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>

                                <div class="mb-3 col-3">
                                    <label for="a" class="form-label">Distrito</label><br>
                                    <select class="form-control" aria-label="Default select example">
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>

                                <div class="mb-3 col-3">
                                    <label for="a" class="form-label">Fecha de Nacimiento</label>
                                    <input type="text" id="fechaNac" class="form-control" name="Fecha_Nac" value="" placeholder="Seleccionar fecha" value="{{old('Fecha_Nac',$IngArqAsesores->Fecha_Nac)}}">
                                    {{-- ID:JS Name:Controlador --}}
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="a" class="form-label">Dirección</label>
                                    <input type="text" class="form-control" name="Direccion" value="{{old('Direccion',$IngArqAsesores->Direccion)}}">
                                </div>
                            </div>
                            
                            <div class="text-center">
                                <input class="btn btn-success" type="submit" value="Guardar">
                                <a class="btn btn-primary" href="{{route('asesores.index')}}">Volver</a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </form>
    


</div>

@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();

	});
</script>


<script>

    var fechaInputNac = document.getElementById("fechaNac");

    flatpickr(fechaInputNac, 
    {
        enableTime: false,
        dateFormat: "Y-m-d",
        
        /* LÓGICA PARA CONDICIONALES EN LA FECHA */
        /* onChange: function(selectedDates, dateStr) {
        // Obtener la fecha actual
            var fechaActual = new Date().toISOString().split('T')[0];
        
            if (dateStr < fechaActual ) {
                //Mensaje de error, permanece desahbilitado FechaRetorno
                alert("Elegir fecha válida");
                document.getElementById('fechaIda').value = ""; // Limpiar el valor del campo Fecha de Ida
            } else {
                    // Cuando se selecciona una fecha de ida válida, la almacenamos en el campo oculto
                    document.getElementById("fechaIda").value = dateStr;
                    // Habilitar Fecha de Retorno y establecer la fecha mínima
                    fechaInputRetorno.disabled = false;
                
            }
            validarFechas();
        } */
    });

</script>

@endsection


