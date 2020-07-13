<?php

namespace App\Http\Controllers;

use App\Empleados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; //Para poder borar información de los registros carpeta upload de storage

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['empleados']=Empleados::paginate(5);
       
       return view('empleados.index',$datos);
      // return redirect($datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=['Nombre'=>'required|string|max:100',
                 'ApellidoPaterno'=>'required|string|max:100',
                 'ApellidoMaterno'=>'required|string|max:100',
                 'Correo'=>'required|email',
                 'Foto'=>'required|max:10000|mimes:jpg,png,jpg,gif,pdf,xml,xls,doc'];
        
        $Mensaje=['Mensaje'=>'El :attribute es requerido'];
         // $this->validate($request,$campos,$Mensaje); //Verificar por que no esta creando         
        //$datosEmpleado=request()->all();
        $datosEmpleado=request()->except('_token'); //Garga el contenido de todos los campos exepto el _token
        //Validar recolectar la foto
        if($request->hasFile('Foto')){
            $datosEmpleado['Foto']=$request->file('Foto')->store('uploads','public'); //Direcciona en nombre del archivo campo de foto a la carpeta public ya que trae un nombre tmp 
        }
        else
        {
            $datosEmpleado['Foto']='noimage.png';
        }
        Empleados::insert($datosEmpleado);  
        //return response()->json($datosEmpleado); 
        return redirect('empleados')->with('Mensaje', 'Datos Insertados, Agregado con éxito | Profile Insert!');

        
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  
        //retorna el vista.blade.php
       $empleado=Empleados::findOrFail($id);  
       return view('empleados.edit',compact('empleado')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
                
        //Recepciona todos los datos menos (token y metodo)
        $datosEmpleado=request()->except(['_token','_method']);  
        
        $campos=['Nombre'=>'required|string|max:100',
                 'ApellidoPaterno'=>'required|string|max:100',
                 'ApellidoMaterno'=>'required|string|max:100',
                 'Correo'=>'required|email'];
        
        //Validar recolectar la foto
        if($request->has('Foto')){ //Si modificó la foto
            $campos+=['Foto'=>'required|max:10000|mimes:jpg,png,jpg,gif,pdf,xml,xls,doc,txt'];  
        }
        $Mensaje=['Mensaje'=>'El :attribute es requerido'];
        //$this->validate($request,$campos,$Mensaje); //Verificar por que no esta creando 
        
        if($request->hasFile('Foto')){ //Si modificó la foto
            $empleado=Empleados::findOrFail($id);  //recupero informacion anterior
            Storage::delete(['public/'.$empleado->Foto]); //Elimino la foto del usuario o empleado
            $datosEmpleado['Foto']=$request->file('Foto')->store('uploads','public'); //Direcciona en nombre del archivo campo de foto a la carpeta public ya que trae un nombre tmp 
        } 

        Empleados::where('id','=',$id)->update($datosEmpleado); 
        
       $empleado=Empleados::findOrFail($id); //Para retornar con la nueva información 
       //return view('empleados.edit',compact('empleado'))->with('Mensaje', 'Datos Actualizados con éxito | Profile updated!');
       return redirect('empleados/'.$id.'/edit')->with('Mensaje', 'Datos Actualizados con éxito | Profile updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //  
        $empleado=Empleados::findOrFail($id);  //recupero informacion anterior
        // if(Storage::delete(['public/'.$empleado->Foto])) //Elimino la foto del usuario o empleado
             Empleados::destroy($id);

        return redirect('empleados');
    }
}
