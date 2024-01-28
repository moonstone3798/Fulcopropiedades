<?php

namespace App\Http\Controllers;
use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $noticias = Noticia::paginate(8);
return view('adminNoticias',
[ 'noticias'=>$noticias ]
);
    }
    public function noticias()
    {
        $noticias = Noticia::paginate(9);        
        return view('/noticias',
        [ 'noticias'=>$noticias ]
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
        return view('agregarNoticia');
    }
    public function mostrar($id)
    {
    
    $Noticia = Noticia::find($id);
    return view('noticia',
                [
                    'Noticia'=>$Noticia
                ]
            );
    }
    private function validar(Request $request) :void
    {
        $request->validate(
            [
                'titulo'=>'required|min:2|max:70',
                'bajada'=>'required|max:4000',
               
            ],
            [
                'titulo.required'=>'Falta completar el campo título',
                'titulo.min'=>'El título tiene una extensión menor a 2 caracteres',
                'titulo.max'=>'El título tiene una extensión mayor a 70 caracteres',
                'bajada.required'=>'Falta completar el campo noticia',
                'bajada.max'=>'La noticia tiene una extensión mayor a 4000 caracteres',
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
        //
        $titulo = $request->titulo;
        $bajada = $request->bajada;
        $id = $request->id;
        $this->validar($request);
        //instanciar + asignar + guardar
        $Noticia = new Noticia;
        $Noticia->id = $id;
        $Noticia->titulo = $titulo;
        $Noticia->bajada= $bajada;
        $Noticia->save();
        //redirección + mensaje ok
        return redirect('/adminNoticias')
        ->with('agregar', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function show(Noticia $noticia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */

   
    public function edit($id)
    {
        //
        
        $Noticia = Noticia::find($id);
        return view('modificarNoticia',
                    [
                        'Noticia'=>$Noticia
                    ]
                );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        //
        //validar
        $titulo = $request->titulo;
        $bajada = $request->bajada;
        $id = $request->id;
        $this->validar($request);
        //instanciar + asignar + guardar
        $Noticia = Noticia::find($request->id);
        $Noticia->id = $id;
        $Noticia->titulo = $titulo;
        $Noticia->bajada= $bajada;
        $Noticia->save();
        //redirección + mensaje ok
        return redirect('/adminNoticias')
        ->with('modificar', 'ok');
       }

    public function confirmar($id)
    {

        # obtener los datos de una noticia
        $Noticia = Noticia::find($id);

        # retornar la vista
        return view('eliminarNoticia',
            [
                'Noticia'=>$Noticia
            ]
        );
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
            # Producto::find($request->idProducto)->delete();
            Noticia::destroy($request->id);
            //redirección con mensaje ok
            return redirect('/adminNoticias')
            ->with('eliminar', 'ok');
           }
}
