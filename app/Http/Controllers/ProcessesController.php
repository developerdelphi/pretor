<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Process;

class ProcessesController extends Controller
{
    private $process;

    public function __construct(Process $entity)
    {
        $this->process = $process;
    }

    public function listing()
    {
        $processes = $this->process->get();
        return response()->json( $processes);
    }

    public function index()
    {
        $processes = $this->process->get(); //->with('area:id,name,origin')->get();
        return response()->json($processes);
    }

    public function show($id)
    {
        ($id) ? $process = process::find($id) : $process = [];
        return response()->json([
            'find'  => $process
        ]);


        return response()->json([
            "error" => "Dados não localizados",
            404
        ]);
    }

    public function store(ProcessRequest $request)
    {
        $input = $request->all();

        $this->entity->create($input);

        return response()->json([
            "success" => true,
            "status" => "positive",
            "message" => message('MSG001')
        ]);
    }

    public function update(ProcessRequest $request, $id)
    {
        $process = $this->process->find($id);
        $process->update($request->all());
        return response()->json([
            "success" => true,
            "status" => "positive",
            "message" => message('MSG002')
        ]);
    }

    public function destroy($id)
    {
        try {
            $this->process->destroy($id);

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
