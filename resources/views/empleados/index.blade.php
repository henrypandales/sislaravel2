 <!-- Styles bootstrap -->  
<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<div style="font-weight:1900;">
  @extends('layouts.app') 
</div>

@section('content')
<div class="container"> 

@if (Session('Mensaje'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close small" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  </b> {{Session('Mensaje')}} </b>
</div>
@endif
 
<a href="{{url('/empleados/create')}}"><input type='button' title="Nuevo" class='btn btn-warning' id='cmdNuevo' value='Nuevo'/></a>
</br>  </br> 
<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th> 
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
     @foreach($empleados as $empleado)
        <tr>
            <td>{{$loop->iteration}}</td> 
            <td><img src="{{asset('storage').'/'.$empleado->Foto}}" class="img-thumbnail img-fluid" alt="logo" width="65"   ></td>
            <td>{{$empleado->Nombre}} {{$empleado->ApellidoPaterno}} {{$empleado->ApellidoMaterno}}</td>
            
            <td>{{$empleado->Correo}}</td>
            
            <td> 
             
                <a href="{{url('/empleados/'.$empleado->id.'/edit')}}" class="small "><input type='button' title="Editar este regisro" class='small btn btn-warning' id='cmdEditar' value='Editar' /></a>
                
                <form method="post" action="{{url('/empleados/'.$empleado->id)}}" style="display:inline">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button type="submit" class="small btn btn-danger" onclick="return confirm('Desea eliminar este Registro??')"> Borrar </button>
                </form>
            </tb>
        </tr>
    </tbody>
    @endforeach
</table>
{{ $empleados->links() }} <!-- Paginación de la Tabla Empleados -->
</div>
@endsection