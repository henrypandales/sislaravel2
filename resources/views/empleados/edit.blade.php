<h1>Editando</h1> 

@extends('layouts.app')

@section('content')
<div class="container"> 

@if (Session('Mensaje'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close small" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  </b>{{Session('Mensaje')}}</b>
</div>
@endif

<form id="form" action="{{url('/empleados/'.$empleado->id)}}" method="post"  enctype="multipart/form-data">
  {{ csrf_field() }}
  {{ method_field('PATCH') }}
  @include('empleados.form',['Modo'=>'Editar'])
</form>
</div>
@endsection