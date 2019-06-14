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
            $areas = $this->area->all();
            return response()->json($areas);
        }

        public function store(AreaRequest $request)
        {
            $input = $request->all();

            $this->area->create($input);

            return response()->json([
                "success" => true,
                "status" => "positive",
                "message" => message('MSG001')
            ]);
        }

        public function show($id)
        {
            $area = $this->area->find($id);
            return response()->json($area);

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
