<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\KindRequest;
use App\Models\Kind;
use App\Models\Area;


class KindsController extends Controller
{
    private $kind;

    public function __construct(Kind $kind)
    {
        $this->kind = $kind;
    }

    public function index()
    {
        $kinds = $this->kind->with('area:id,name,origin')->get();
        return response()->json($kinds);
    }

    public function show($id)
    {
        $kind = $this->kind->find($id); //->with('area:id,name,origin');

        if (count($kind) > 0) return response()->json($kind);

        return response()->json([
            "error" => "Dados não localizados",
            404
        ]);
    }

    public function store(KindRequest $request)
    {
        $input = $request->all();

        $this->kind->create($input);

        return response()->json([
            "success" => true,
            "status" => "positive",
            "message" => message('MSG001')
        ]);
    }

    public function update(KindRequest $request, $id)
    {
        $kind = $this->kind->find($id);
        $kind->update($request->all());
        return response()->json([
            "success" => true,
            "status" => "positive",
            "message" => message('MSG002')
        ]);
    }

    public function destroy($id)
    {
        try {
            $this->kind->destroy($id);

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
