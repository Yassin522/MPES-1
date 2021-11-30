<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;




class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $prodect = Prodect::find($id)->get();
        //$discounts =$prodect->$discounts
        //return response ()->json($discounts);
    }

    /**
     * Show the form for sershByName the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function sershByName(product $product)
    {
       // $prodects = Prodect::find($product->user_id)->get();
       return  $prodect=product:: where('product_name','%$query%');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {//Done
            $product =Product::find($id); $product->delete(); return $product;
    }
    public function getProdects()
    {
        $product= product::with(['users'=>function($q)
        {$q->select(
            'product_name',
            'expiry_date',
            'image','type','num_likes','price',
            'amount_products','user_id'
        );}])->get();

        return  response()->json($product, 200, $headers);
      //return Prodect::all(); anthor way
    }



    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_name'=>['required','string'],
            'expiry_date'=>['required'],
            'image'=>['required','text'],
            'type'=>['required','string'],
            'num_likes'=>['required','numeric'],
            'price'=>['required','numeric'],
            'amount_products'=>['required','numeric'],
            'user_id'=>['required','numeric'],
        ]);

        if($validator->fails()){
            return $validator->errors()->all();
        }
        $product = product::query()->create([
            'product_name' => $request->product_name ,
            'expiry_date' => $request->expiry_date,
            'image' => $request->image,
            'type' => $request->type,
            'num_likes' => $request->num_likes,
            'price' => $request->price,
            'amount_products' => $request->amount_products,
            'user_id' => $request->user_id

        ]);
        if($user->save())
        return ['status'=>'Product created successfully.'];

    }
}
