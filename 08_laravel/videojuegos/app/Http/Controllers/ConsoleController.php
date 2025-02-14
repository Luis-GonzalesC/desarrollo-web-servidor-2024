<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consola;

class ConsoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*$consolas = [
            "PS4",
            "PS5",
            "Nintendo Switch"
        ];*/

        $consolas = Consola::all();//Es como un select que hace toda la lógica como un fetch en php

        return view('consolas/index', ["consolas" => $consolas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Funcion para crear las consolas, la ruta está en las view
        return view('consolas/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $consola = new Consola;
        $consola -> nombre = $request -> input("nombre");
        //Lo de arriba de request es igual que $_POST["nombre"];
        $consola -> ano_lanzamiento = $request -> input("ano_lanzamiento");
        //Lo de arriba de request es igual que $_POST["ano_lanzamiento"];
        
        $consola -> save(); //Esto para hacer como el insert;
        return redirect('/consolas');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $consola = Consola::find($id);//Busca por ID y te devuelve 1 con todas las propiedades
        //Es como si fuera un SELECT * FROM TABLA WHERE ID= id;

        return view('consolas/show', ["consola" => $consola]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
