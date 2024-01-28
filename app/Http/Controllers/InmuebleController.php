<?php

namespace App\Http\Controllers;

use App\Models\Inmueble;
use Illuminate\Http\Request;


class InmuebleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $inmuebles = Inmueble::paginate(8);
        return view(
            'adminInmuebles',
            ['inmuebles' => $inmuebles]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('agregarInmueble');
    }

    private function validar(Request $request): void
    {
        $request->validate(
            [
                'direccion' => 'required|min:2|max:250',
                'imagen' => 'max:2048',
                'descripcion' => 'required|min:3|max:300',
                'destacada' => 'required',

            ],
            [
                'direccion.required' => 'Falta completar el campo dirección',
                'direccion.min' => 'la dirección debe tener como mínimo 2 caracteres',
                'direccion.max' => 'El campo dirección debe tener 250 caracteres como máximo',
                'imagen.max' => 'Debe ser una imagen de 2MB como máximo',
                'descripcion.required' => 'Falta completar el campo descripción',
                'descripcion.min' => 'la descripción debe tener como mínimo 2 caracteres',
                'descripcion.max' => 'El campo descripción debe tener 300 caracteres como máximo',
                'destacada.required' => 'Debe decidir si la propiedad será destacada o no ',
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $imagenes = array();
        if ($files = $request->file('imagenes')) {
            foreach ($files as $file) {
                $nombreimg = uniqid();
                $ext = $file->getClientOriginalExtension();
                $img = $nombreimg . '.' . $ext;
                $file->move(public_path('inmuebles/'), $img);
                $imagenes[] = $img;
            }
        }
        Inmueble::insert([
            'imagenes' => implode('|', $imagenes),
            'direccion' => $request->direccion,
            'preciov' => $request->preciov,
            'precioa' => $request->precioa,
            'descripcion' => $request->descripcion,
            'destacada' => $request->destacada,
        ]);
        return redirect('/adminInmuebles')
            ->with('agregar', 'ok');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inmueble  $inmueble
     * @return \Illuminate\Http\Response
     */
    public function show(Inmueble $inmueble)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inmueble  $inmueble
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Inmueble = Inmueble::find($id);
        return view(
            'modificarInmueble',
            [
                'Inmueble' => $Inmueble
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inmueble  $inmueble
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        //validar
        $direccion = $request->direccion;
        $preciov = $request->preciov;
        $precioa = $request->precioa;
        $descripcion = $request->descripcion;
        $destacada = $request->destacada;
        $id = $request->id;
        $this->validar($request);

        //instanciar + asignar + guardar
        $Inmueble = Inmueble::find($request->id);
        $Inmueble->id = $id;
        $Inmueble->direccion = $direccion;
        $Inmueble->preciov = $preciov;
        $Inmueble->precioa = $precioa;
        $Inmueble->descripcion = $descripcion;
        $Inmueble->destacada = $destacada;
        $Inmueble->save();
        //redirección + mensaje ok

        return redirect('/adminInmuebles')
            ->with('modificar', 'ok');
    }

    public function inicio(Request $request)
    {

        $inmuebles = Inmueble::where("destacada", "LIKE", "1")
            ->paginate(9);

        return view(
            '/inicio',
            ['inmuebles' => $inmuebles]
        );

    }

    public function ventas()
    {
        $inmuebles = Inmueble::whereNotNull("preciov")
            ->paginate(9);

        return view(
            '/ventas',
            ['inmuebles' => $inmuebles]
        );
    }
    public function mostrarpropiedad($id)
    {
        $imagenes = array();
        $Inmueble = Inmueble::find($id);
        return view(
            'mostrarpropiedad',
            [
                'Inmueble' => $Inmueble,
            ]
        );

    }
    public function mostrarVentas($id)
    {

        $Inmueble = Inmueble::find($id);
        return view(
            'mostrarVentas',
            [
                'Inmueble' => $Inmueble
            ]
        );

    }
    public function alquiler(Request $request)
    {

        $inmuebles = Inmueble::whereNotNull("precioa")
            ->paginate(9);

        return view(
            '/alquiler',
            ['inmuebles' => $inmuebles]
        );
    }
    public function mostrarAlquileres($id)
    {

        $Inmueble = Inmueble::find($id);
        return view(
            'mostrarAlquileres',
            [
                'Inmueble' => $Inmueble
            ]
        );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inmueble  $inmueble
     * @return \Illuminate\Http\Response
     */

    public function confirmar($id)
    {

        # obtener los datos de una Compra
        $Inmueble = Inmueble::find($id);

        # retornar la vista
        return view(
            'eliminarInmueble',
            [
                'Inmueble' => $Inmueble
            ]
        );
    }

    public function destroy(Request $request)
    {
        //
        # Producto::find($request->idProducto)->delete();
        Inmueble::destroy($request->id);
        //redirección con mensaje ok
        return redirect('/adminInmuebles')
            ->with('eliminar', 'ok');
    }
}