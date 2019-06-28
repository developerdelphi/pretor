<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonaRequest;
use App\Models\Persona;

class PersonasController extends Controller
{
    private $persona;

    public function __construct(Persona $persona)
    {
        $this->persona = $persona;
    }

    public function search($name)
    {
        $personas = $this->persona->where('name', 'like', "%$name%")->get();
        return response()->json(['list' => $personas]);
    }

    public function listing()
    {
        $personas = $this->persona->get();
        return response()->json($personas);
    }

    public function index()
    {
        $personas = $this->persona->get(); //->with('area:id,name,origin')->get();
        return response()->json($personas);
    }

    public function show($id)
    {
        ($id) ? $persona = persona::find($id) : $persona = [];
        return response()->json([
            'find'  => $persona
        ]);
        return response()->json([
            "error" => "Dados não localizados",
            404
        ]);
    }

    public function store(PersonaRequest $request)
    {
        $input = $request->all();

        $this->persona->create($input);

        return response()->json([
            "success" => true,
            "status" => "positive",
            "message" => message('MSG001')
        ]);
    }

    public function update( PersonaRequest $request, $id)
    {
        $persona = $this->persona->find($id);
        $persona->update($request->all());
        return response()->json([
            "success" => true,
            "status" => "positive",
            "message" => message('MSG002')
        ]);
    }

    public function destroy($id)
    {
        try {
            $this->persona->destroy($id);

            return response()->json([
                "success" => true,
                "status" => "positive",
                "message" => message('MSG003')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "success" => false,
                "status" => "negative",
                "message" => message('MSG005')
            ]);
        }
    }
}
