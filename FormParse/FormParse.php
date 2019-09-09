<?php

namespace App\Traits;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Validator;
use App\Traits\Box;

trait FormParse
{

    protected function getArray(Request $request,$key=null){
        if(!isset($key)){
          $data = $request->all();
            $raw = json_decode($data['data']);
            $bag = array();
            foreach ($raw as $key) {
                $bag[$key->name] = $key->value;
            }

        }else{
            $data = $request->$key;
            $raw = json_decode($data);
            $bag = array();
            foreach ($raw as $key) {
                $bag[$key->name] = $key->value;
            }
        }
        if (isset($bag['_token'])) {
            array_forget($bag, '_token');
        }
        return $bag;

    }

    protected function getObj(Request $request,$key=null)
    {
        $box = new Box;
        if(!isset($key)){
            $data = $request->except('_token');
              $raw = json_decode($data['data']);

              foreach ($raw as $key) {
                  if($key->name == '_token' ){
                        continue;
                  }else{
                  $request->request->{$key->name} = $key->value;
                  }
              }
          }else{
              $data = $request->$key;
              $raw = json_decode($data);

              foreach ($raw as $key) {
                if($key->name == '_token' ){
                    continue;
              }else{
              $request->request->{$key->name} = $key->value;
              }
              }
          }

         $request->offsetUnset('data');

          return $request;


    }

    protected function withValidate($data, $rules){
        $rule = (is_array($rules)) ? $rules : $rules->rules();
        Validator::make($data, $rule)->validate();
    }
}
