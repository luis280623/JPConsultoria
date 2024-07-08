@extends('Layout.Index')
@section('content')
    

<div class="container-fluid">
    {{-- SCRIPT PARA FECHA --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <br>
    <form action="{{route('asesores.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card my-2 mx-5" >
            <div class="my-4 mx-4">
                <div class="text-center">
                    <h1>Nuevo Asesor</h1>
                </div>
                <div class="row g-0">

                    <div class="col-md-4">
                        <img src="..." class="img-fluid rounded-start" alt="...">
                    </div>

                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label for="a" class="form-label">Nombres: </label>
                                    <input type="text" name="Nombre" class="form-control" id="a" value="{{old('Nombre')}}">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="a" class="form-label">Apellidos: </label>
                                    <input type="text" name="Apellido" class="form-control" id="a" value="{{old('Apellido')}}">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label for="a" class="form-label">Cuenta Bancaria BCP</label>
                                    <input type="text" class="form-control" name="CuentaBancaria" value="{{old('CuentaBancaria')}}">
                                </div>
    
                                <div class="mb-3 col-6">
                                    <label for="a" class="form-label">Cuenta Interbancaria</label>
                                    <input type="text" class="form-control" name="CuentaInterbancaria" value="{{old('CuentaInterbancaria')}}">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label for="a" class="form-label">Email</label>
                                    <input type="email" class="form-control" aria-describedby="emailHelp" name="Email" value="{{old('Email')}}">
                                </div>
    
                                <div class="mb-3 col-3">
                                    <label for="a" class="form-label">Celular</label>
                                    <input type="text" class="form-control" name="celular" value="{{old('celular')}}">
                                </div>

                                <div class="mb-3 col-3">
                                    <label for="a" class="form-label">Dni</label>
                                    <input type="text" class="form-control" name="Dni" value="{{old('Dni')}}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-3">
                                    <label for="a" class="form-label">Departamento</label><br>
                                    <input type="text" name="Departamento" class="form-control" id="a">
                                </div>
    
                                <div class="mb-3 col-3">
                                    <label for="a" class="form-label">Provincia</label><br>
                                    <input type="text" name="Provincia" class="form-control" id="a" >
                                </div>

                                <div class="mb-3 col-3">
                                    <label for="a" class="form-label">Distrito</label><br>
                                    <input type="text" name="Distrito" class="form-control" id="a" >
                                </div>

                                <div class="mb-3 col-3">
                                    <label for="a" class="form-label">Fecha de Nacimiento</label>
                                    <input type="text" id="fechaNac" class="form-control" name="Fecha_Nac" value="{{old('Fecha_Nac')}}" placeholder="Seleccionar fecha">
                                    {{-- ID:JS Name:Controlador --}}
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="a" class="form-label">Dirección</label>
                                    <input type="text" class="form-control" name="Direccion" value="{{old('Direccion')}}" >
                                </div>
                            </div>

                            <div class="row">
                                <!-- Para ver la imagen seleccionada, de lo contrario no se -->
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <img id="imagenSeleccionada" style="max-height: 300px;">           
                                </div>

                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Subir Imagen</label>
                                    <div class='flex items-center justify-center w-full'>
                                        <label class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group'>
                                            <div class='flex flex-col items-center justify-center pt-7'>
                                            <svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                            <p class='text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>Seleccione la imagen</p>
                                            </div>
                                        <input name="Foto" id="Foto" type='file' class="hidden" />
                                        </label>
                                    </div>
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

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
<script>   
    $(document).ready(function (e) {   
        $('#Foto').change(function(){            
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#imagenSeleccionada').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
        });
    });
</script>
@endsection


