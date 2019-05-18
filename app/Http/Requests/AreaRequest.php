<?php

namespace App\Http\Requests;



use App\Models\Area;
use Illuminate\Validation\Rule;


class AreaRequest extends Request
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules(Area $area)
  {
    
    $rules = [
      'name' => 'required|min:3|max:191|unique',
      'origin' => [
        'required',
        Rule::in(['Judicial', 'Administrativo'])
        //Rule::in(array_keys($area->originValue()))
      ]
    ];
    
    return $rules;
  }
}
