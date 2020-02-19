<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Validator;

class ProductController extends Controller
{
    public function create(Request $request)
    {
        $validate=Validator::make($request->all(),[
            'category'=>'required',
            'price'=>'required',
            'name'=>'required',
        ] );
        if($validate->fails())
        {
            return response()->json(['error'=>$validate->errors()],401);
        }
    $products=new Product();
    $products->name=$request->input('name');
    $products->category=$request->input('category');
    $products->price=$request->input('price');
    
    
    if($products->save())
    {
    return response()->json($products);
    }
    else{
        echo 'error';
    }
    }
    public function updatebyid(Request $request)
    {
        $products= Product::find($request->id);
        $products->name=$request->input('name');
        $products->category=$request->input('category');
        $products->price=$request->input('price');

        $products->save();
        return response()->json($products);

    } 
}
