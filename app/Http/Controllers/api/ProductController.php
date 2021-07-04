<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Validator;
use App\Models\AppHttpResponse;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products =  Product::orderBy('created_at','DESC')->get();
        return ProductResource::collection( $products );
        //  return response()->json(['response' => ['status' => 'success', 'products' => $products ]]);
    }

    public function myproducts()
    {
        $products =  Product::where('user_id', auth('api')->id() )->orderBy('created_at','DESC')->get();
        return ProductResource::collection( $products );
    }

   
    public function search($item)
    {
         $searched = Product::where('name', 'like', '%'. $item  . '%' )->get();
         return ProductResource::collection( $searched );
    }
    public function searchNameSequence($item)
    {
         $searched = Product::where('name', 'like', '%'. $item  . '%' )->get();
         return ProductResource::collection( $searched );
    }

    public function searchMyProducts($item)
    {
         $searched = Product::where('user_id', auth('api')->id() )->where('name', 'like', '%'. $item  . '%' )->get();
         return ProductResource::collection( $searched );
        //  return response()->json(['response' => ['status' => 'success', 'data' => $searched]]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request , [
            'name' => 'required|string|unique:products',
            'description' => 'required|string',
            'price' => 'required|integer',
            'image'=>'required|mimes:png,jpeg,jpg|max:10000',
        ]);

        $product = new product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->user_id = auth('api')->id();
        $product->save();

        if($request->image ){
            $imageName = time().$request->image->getClientOriginalName();
            $imageDirPath = '/images/product/';
            $request->image->move('images/product',$imageName);
            $product->image = $imageDirPath . $imageName;
            $product->update();
        }

        return AppHttpResponse::responseSuccess(
            Response::HTTP_CREATED,
            "product created successfully",
            new ProductResource($product)
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        if( $product == null )
        {
            return AppHttpResponse::notFound();
        }

        return AppHttpResponse::responseSuccess(
            Response::HTTP_OK,
            "successfully retrieved resource",
            new ProductResource($product)
        );

        // return response()->json(['response'=> ['status'=> 'Success', 'product' => $product ]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 

    public function update(Request $request, $id)
    {
        
        $this->validate($request , [
            'name' => 'required|string|unique:products,name,'.$id,
            'description' => 'required|string',
            'price' => 'required|integer',
            // 'image'=>'nullable|mimes:png,jpeg,jpg|max:10000',
        ]);

        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->user_id = auth('api')->id();
        $product->update();

        return AppHttpResponse::responseSuccess(
                Response::HTTP_CREATED,
                "product updated successfully",
                new ProductResource($product)
            );
            // return response()->json(['response' => ['status' => 'success', 'message'=> 'Action Successful']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $imagePath = public_path($product->image);
        if(File::exists($imagePath)) {
            File::delete($imagePath);
        }
        $product->delete();
        return response()->json(['response' => ['status' => 'success']]);
    }
}
