 
 
   
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Styles bootstrap -->   
    <link href="{{ asset('css/csshenry/AdminLTE.min.css') }}" rel="stylesheet">    

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <!-- Scripts -->
  

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  
<script src="{{asset('js/jquery.min.js')}}"></script>
<?php 
 
class Empleado
{ public static $table = "empleado"; 
 public $Nombre = ""; 
 public $ApellidoPaterno = "";
 public $ApellidoMaterno = "";
 public $Correo = "";
 public $Foto = ""; 
 
 public function constructor ($Nombre,$ApellidoPaterno,$ApellidoMaterno,$Correo,$Foto){
  $this->Nombre = $Nombre; 
  $this->ApellidoPaterno = $ApellidoPaterno;
  $this->ApellidoMaterno = $ApellidoMaterno;
  $this->Correo = $Correo;
  $this->Foto = $Foto; 
 }
 
 function suedad(){
  //
 }

 function getinfo(){
  //
 }

 public function log($msg)
 {
  echo $msg;
 }
}
 
if (!isset($empleado->id))$empleado=new Empleado(); 

if($Modo=='Crear'){ } 
 
?>

<script>
  
$(document).ready(function()
{ var form = document.getElementById("form");
      form.addEventListener("focus", function( event ) {
      event.target.style.background = "#FFFFCA"; 
      }, true);
      form.addEventListener("blur", function( event ) {
      event.target.style.background = "";  
      }, true);
});


 function Validar(cl) 
 {  $('#'+cl).val($('#'+cl).val().trim()); $('#'+cl).removeClass(); 
    $('#'+cl).addClass("form-control {{$errors->has("+cl+")?'is-invalid':''}}");
    $('#'+cl).attr("title", "Ingrese el campo "+cl); $('#'+cl).css("background-color", "");
    $('#fb'+cl).css('display', 'none').fadeOut(500); 
    
 if($('#'+cl).val().length<1)
 {  $('#fb'+cl).css('display', 'block'); $('#fb'+cl).css('display', 'block').fadeOut(500); 
    $('#'+cl).addClass("form-control is-invalid"); 
    $('#fb'+cl).show().fadeIn(500); 
    $('#'+cl).attr("title", "Debe Ingrese el campo "+cl); 
    $('#fb'+cl).show().fadeIn(500);
 }
 cl.preventDefault();
 }

function info(title,msg,segundos=500,nClase=1)
{ altclass="alert alert-success"
 if(nClase==-1)altclass="alert alert-warning"
  /*
 $('#msgalert').removeClass(); $('#msgalert').addClass(altclass);
 $("#lbinfo-tit").html(title); $("#lbinfo-txt").html(msg); 
 $("#msgalert").fadeIn(500); $("#msgalert").fadeOut(segundos); 
 */
} 

 
</script>

 <h3> {{ ($Modo=='Crear')? 'Agregando Empleado ' : 'Modificando Empleado' }} </h3>
 </br>
 <div id="msgalert" hidden="" class="alert alert-success"> 
 <b id="lbinfo-tit"> </b>
 <txt id="lbinfo-txt"> </txt>
 </div>

 <label form="Nombre" >{{'Nombre'}} </label>
 <input type="text" onblur="Validar('Nombre');" class="form-control {{$errors->has('Nombre')?'is-invalid':''}}" name="Nombre" id="Nombre" required value="{{ isset($empleado->ApellidoMaterno)?$empleado->Nombre:old('Nombre') }}" title="Nombres">
 {!! $errors->first('Nombre','<div class="invalid-feedback">:message</div>') !!} <!-- evitar ataques con formato script -->
 <div id="fbNombre" style="display:none" class="invalid-feedback"><b>Falta </b> !! Ingresar el Nombre !! </div>
 </br> 
 <label form="ApellidoPaterno" >{{'Apellido Paterno'}} </label>
 <input type="text" onblur="Validar('ApellidoPaterno');" name="ApellidoPaterno" class="form-control {{$errors->has('ApellidoPataterno')?'is-invalid':''}}" id="ApellidoPaterno" required value="{{ isset($empleado->ApellidoPaterno)?$empleado->ApellidoPaterno:old('ApellidoPaterno') }}" title="Apellido Paterno">
 {!! $errors->first('ApellidoPaterno','<div class="invalid-feedback">:message</div>') !!}
 <div id="fbApellidoPaterno" style="display:none" class="invalid-feedback"><b>Falta </b> !! Ingresar el Apellido Paterno !! </div>
 </br> 
 <label form="ApellidoMaterno" >{{'Apellido Materno'}} </label>
 <input type="text" onblur="Validar('ApellidoMaterno');" name="ApellidoMaterno" class="form-control {{$errors->has('ApellidoMaterno')?'is-invalid':''}}" id="ApellidoMaterno" required value="{{ isset($empleado->ApellidoMaterno)?$empleado->ApellidoMaterno:old('ApellidoMaterno') }}" title="Apellido Materno">
 {!! $errors->first('ApellidoMaterno','<div class="invalid-feedback">:message</div>') !!}
 <div id="fbApellidoMaterno" style="display:none" class="invalid-feedback"><b>Falta </b> !! Ingresar el Apellido Materno !! </div>
 </br> 
 
 <label form="Correo" >{{'Correo'}} </label>
 <input type="text" onblur="Validar('Correo');" name="Correo" class="form-control {{$errors->has('Correo')?'is-invalid':''}}" id="Correo" required value="{{ isset($empleado->Correo)?$empleado->Correo:old('Correo') }}" title="Correo">
 {!! $errors->first('Correo','<div class="invalid-feedback">:message</div>') !!}
 <div id="fbCorreo" style="display:none" class="invalid-feedback"><b>Falta </b> !! Ingresar el Correo !! </div>
 </br>  
 @if ($empleado->Foto) 
 <div> 
  <img src="{{asset('storage').'/'.$empleado->Foto}}" alt="logo" width="100" height="100" class="img-thumbnail img-fluid">
 </div> 
 @endif
 <label form="Foto" >{{'Foto'}} </label>
 <input type="file" onblur="Validar('Foto');" name="Foto" class="form-control {{$errors->has('Foto')?'is-invalid':''}}" id="Foto" value="{{$empleado->Foto}}" title="Foto archivo">
 {!! $errors->first('Foto','<div class="invalid-feedback">:message</div>') !!}
 <div id="fbFoto" style="display:none" class="invalid-feedback"><b>Falta </b> !! Ingresar la Foto formato (jpg,png,jpg,gif) !! </div>
 </br>
 <input type="submit" required value="Aceptar"> 
 <a href="{{url('/empleados/')}}"><input type='button' title="Cancelar" class='btn btn-warning' id='cmdCancelar' value='Cancelar'/></a>
