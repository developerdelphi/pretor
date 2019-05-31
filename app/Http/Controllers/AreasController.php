<?php

namespace App\Http\Controllers;

use App\Http\Requests\AreaRequest;
use App\Models\Area;
use Illuminate\Http\Request;

class AreasController extends Controller
{
  private $area;

  public function __construct(Area $area)
  {
    $this->area = $area;
  }

  public function listing()
  {
    return response()->json([
      'list' => Area::get()], 200);
  }

  public function index(Request $request)
  {
    $name = $origin = '';
    $column = 'name';
    $direction = 'asc';
    $per_page = 30;

    if($request->has('per_page')){ $per_page = $request->input('per_page');}

    if($request->has('direction')){ $direction = $request->input('direction'); }

    if($request->has('column')){ $column= $request->input('column'); }

    $areas = $this->area->orderBy($column, $direction);

    if($request->has('name')){
      $areas = $areas->where('name', 'LIKE', "%".$request->input('name')."%");
      $name = $request->input('name');
    }

    if($request->has('origin')){
      $areas = $areas->where('origin', 'LIKE', "%".$request->input('origin')."%");
      $origin = $request->input('origin');
    }

    $areas = $areas->paginate($per_page);

    $response = [
      'areas' => $areas,
      'params' => [
        'total' => $areas->total(),
        'per_page' => $areas->perPage(),
        'current_page' => $areas->currentPage(),
        'last_page' => $areas->lastPage(),
        'next_page_url' => $areas->nextPageUrl(),
        'prev_page_url' => $areas->previousPageUrl(),
        'direction' => $direction,
        'column' => $column
      ],
      'filters' => [
        'name' => $name,
        'origin' => $origin
      ]
    ];
    return response()->json($response);
  }

  public function store(AreaRequest $request){

    $input = $request->all();

    $this->area->create($input);

    return response()->json([
      "success" => true,
      "status" => "positive",
      "message" => message('MSG004')
    ]);
  }

  public function show($id)
  {
    $area = $this->area->find($id);

    if(count($area)>0) return response()->json($area);

    return response()->json([
      "error" => "Dados não localizados",
      404
    ]);
  }

  public function update(AreaRequest $request, $id)
  {
    $area = $this->area->find($id);

    $area->update($request->all());

    return response()->json([
      "success" => true,
      "status" => "positive",
      "message" => message('MSG002')
    ]);
  }

  public function destroy($id)
  {
    try{
      $this->area->destroy($id);

      return response()->json([
        "success" => true,
        "status" => "positive",
        "message" => message('MSG003')
      ]);
    }catch (\Exception $e){
      return response()->json([
        "success" => false,
        "status" => "negative",
        "message" => message('MSG005')
      ]);
    }
  }
}
