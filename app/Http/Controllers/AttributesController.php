<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AttributeRequest;
use App\Models\Attribute;


class AttributesController extends Controller
{
    private $attribute;

    public function __construct(Attribute $attribute)
    {
        $this->attribute = $attribute;
    }

    public function listing($qualificationId)
    {
        if ($qualificationId) {
            $list = $this->attribute->qualification->where('id', $qualificationId)->get();
        } else {
            $list = $this->attribute->get();
        }
        return response()->json([
            'list' => $list
        ], 200);
    }

    public function index()
    {
        $attributes = $this->attribute->get();
        return response()->json($attributes);
    }

    public function show($id)
    {
        if ($id) $attribute = Attribute::find($id);
        else $attribute = [];

        return response()->json([
            'find'  => $attribute,
        ]);

        return response()->json([
            "error" => "Dados não localizados",
            404
        ]);
    }

    public function store(AttributeRequest $request)
    {
        $input = $request->all();

        $this->attribute->create($input);

        return response()->json([
            "success" => true,
            "status" => "positive",
            "message" => message('MSG001')
        ]);
    }

    public function update(AttributeRequest $request, $id)
    {
        $attribute = $this->attribute->find($id);
        $attribute->update($request->all());
        return response()->json([
            "success" => true,
            "status" => "positive",
            "message" => message('MSG002')
        ]);
    }

    public function destroy($id)
    {
        try {
            $this->attribute->destroy($id);

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
