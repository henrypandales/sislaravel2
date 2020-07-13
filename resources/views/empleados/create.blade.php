
<h1> (Creando Empleados)</h1> 
 
 @extends('layouts.app')
 
 @section('content')
 <div class="container"> 
  <!-- Validación de Errores Campos en Blanco en la captura -->
 @if(count($errors)>0)
 <div hidden class="alert alert-danger" roles="alert">
   <ul>
   @foreach($errors->all() as $e)
     <li>{{$e}} </li>
   @endforeach  
   </ul>
 </div>
 @endif
  <!-- form enctype="multipart/form-data": para enviar fotografias desde el formulario -->
 <form id="form" action="{{url('/empleados')}}" method="post" enctype="multipart/form-data">
   {{csrf_field()}} 
   @include('empleados.form',['Modo'=>'Crear','empleado'=>[]])
 </form>
 </div>
 @endsection