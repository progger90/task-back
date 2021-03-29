<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Http\Requests\CarRequest;
use Validator;

class CarController extends Controller
{
    public function index()
    {
        return response()->json(Car::all()->keyBy('id')->toArray(), 200);
        /*
         ->withHeaders([
            'Content-Type' => 'json',
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin',
        ])*/
    }

    public function show($id)
    {
        return response()->json(Car::find($id)->toArray(), 200);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $isValid = $this->checkValid($input);

        if($isValid['success']){
            $car = Car::create($input);
            return response()->json($car->toArray(), 201);
        } else {
            return $isValid['error'];
        }
    }

    public function update($id, Request $request)
    {
        $input = $request->all();

        $isValid = $this->checkValid($input);

        if($isValid['success']){
            $car = Car::findOrFail($id);
            $car->update($input);
            return response()->json($car->toArray(), 200);
        } else {
            return $isValid['error'];
        }
    }

    public function delete(Request $request, $id)
    {
        $car = Car::findOrFail($id);
        if($car->delete()) {
            return response()->json('Запись успешно удалена', 200);
        }
    }

    public function checkValid($input){
        $validator = Validator::make($input, [
            'mark' => 'required',
            'model' => 'required',
            'color' => 'required',
            'year' => 'required|integer'
        ]);

        if($validator->fails()){
            return ['success' => false, 'error' => response()->json($validator->errors())];
        } else {
            return ['success' => true];
        }
    }
}
