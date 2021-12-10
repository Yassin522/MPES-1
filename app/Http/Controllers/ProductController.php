<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;



class ProductController extends Controller
{

// public function store(Request $request)
// {//Done
//     $inputs = $request->all();
//     return $product = Product::Create($inputs);
// }


    public function show( $id)
    {
        # Done...

           $product = Product::find($id);

           return  $product->load(['user']);
    }

    public function searchByName(string $product_name)
    {
        # Done...

     // dd(product::where('product_name', $product_name)->get());
    return  product::where('product_name', $product_name)->get();


    }


    public function sorting(string $type )
    {
        # code...
          $product = product::orderBy('type')->get();
         // dd($product);
          return  $product;
        }

   public function addLike( $id, Request $request)
   {
       #Done
    $product=Product::find($id)->get();
     if($request->num_likes!=null)
       {        DB::table('products')
                ->where('id', $id)
                ->update(['num_likes'=>$request->num_likes]);
        }
        return['Update like done'];
    }




  // public function indexPaging()
    // {
    //     $products = Product::paginate(5);

    //     return view('products.index-paging')->with('products', $products);
    // }
// Route::get('products/index-paging', 'ProductsController@indexPaging');






    public function destroy($id)
    {
        # Done...

            $product =Product::find($id); $product->delete(); return $product;
    }



    public function getProducts()
     {
         # Done...
        $product=product::query()->with(['user'])->get();
        return $product;

    }



    public function add(Request $request)
    {
        # Done...

        $validator = Validator::make($request->all(), [
            'product_name'=>['string'],
            'expiry_date'=>['required'],
            'image'=>['required','string'],
            'type'=>['required','string'],
            'num_likes'=>['required','numeric'],
            'price'=>['required','numeric'],
            'amount_products'=>['required','numeric'],
            'user_id'=>['required','numeric'],
        ]);

        if($validator->fails()){
            return $validator->errors()->all();
        }

        $product = Product::query()->create([
            'product_name' => $request->product_name,
            'expiry_date' => $request->expiry_date,
            'image' => $request->image,
            'type' => $request->type,
            'num_likes' => $request->num_likes,
            'price' => $request->price,
            'amount_products' => $request->amount_products,
            'user_id' => $request->user_id

        ]);
        if($product->save())
        return ['status'=>'Product created successfully.'];

    }
}
