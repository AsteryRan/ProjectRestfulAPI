<?php

namespace App\Http\Controllers;

use App\Models\D111811011_new;
use Illuminate\Http\Request;

class D111811011_newsController extends Controller{
    public function index(){
        $items = D111811011_new::OrderBy("id", "ASC")->get();
        $output = [
            "message" => "items",
            "results" => $items
        ];

        return response()->json($items, 200);
    }
    public function store(Request $request)
	{
		$input = $request->all();
		$post = D111811011_new::create($input);
		return response()->json($post, 200);
    }
    public function show($id)
	{
		$post = D111811011_new::find($id)->get();
		
		if(!$post){
			abort(404);
		}
		
		return response()->json($post, 200);
    }
    public function destroy($id)
	{
		$post = D111811011_new::find($id);
		
		if(!$post){
			abort(404);
		}
		
		$post->delete();
		$message = ['message' => 'deleted successfully', 'id' => $id];
		
		return response()->json($message, 200);
    }
    public function update(Request $request, $id)
	{
		$input = $request->all();
		$post = D111811011_new::find($id);
		
		if(!$post){
			abort(404);
		}
		
		$post->fill($input);
		$post->save();
		
		return response()->json($post, 200);
	}
}
?>