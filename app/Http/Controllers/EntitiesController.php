<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EntityRequest;
use App\Models\Entity;

class EntitiesController extends Controller
{
    private $entity;

    public function __construct(Entity $entity)
    {
        $this->entity = $entity;
    }

    public function listing()
    {
        $entities = $this->entity->get();
        return response()->json($entities);
    }

    public function index()
    {
        $entities = $this->entity->get(); //->with('area:id,name,origin')->get();
        return response()->json($entities);
    }

    public function show($id)
    {
        ($id) ? $entity = entity::find($id) : $entity = [];
        return response()->json([
            'find'  => $entity
        ]);


            return response()->json([
                "error" => "Dados não localizados",
                404
            ]);

    }

    public function store(EntityRequest $request)
    {
        $input = $request->all();

        $this->entity->create($input);

        return response()->json([
            "success" => true,
            "status" => "positive",
            "message" => message('MSG001')
        ]);
    }

    public function update(EntityRequest $request, $id)
    {
        $entity = $this->entity->find($id);
        $entity->update($request->all());
        return response()->json([
            "success" => true,
            "status" => "positive",
            "message" => message('MSG002')
        ]);
    }

    public function destroy($id)
    {
        try {
            $this->entity->destroy($id);

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
