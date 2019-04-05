<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Models\Product;
use App\Models\Category;
use DB;
class ProductController extends Controller
{
    //
    public function getProduct() {
        $data['productlist'] = DB::table('products')->join('categories','products.prod_cate','=','categories.cate_id')->orderBy('prod_id','desc')->get();
    	return view('backend.product',$data);

    }

    public function getAddProduct() {
        $data['catelist'] = Category::all();
    	return view('backend.addproduct',$data);
    	
    }

    public function postAddProduct(AddProductRequest $request) {
    	$filename = $request->img->getClientOriginalName();
        $product = new Product;
        $product->name = $request->name;
    	$product->slug = str_slug($request->name);
        $product->img = $filename;
        $product->quantity = $request->quantity;
        $product->accessories = $request->accessories;
        $product->price = $request->price;
        $product->warranty = $request->warranty;
        $product->promotion = $request->promotion;
        $product->condition = $request->condition;
        $product->status = $request->status;
        $product->description = $request->description;
        $product->prod_cate = $request->cate;
        $product->featured = $request->featured;
        $product->save();
        $request->img->storeAs('avatar',$filename);
        return back();

    }

    public function getEditProduct($id) {
        $data['product'] = Product::find($id);
        $data['listcate'] = Category::all();
    	return view('backend.editproduct',$data);
    	
    }

    public function postEditProduct(Request $request,$id) {
        $product = new Product;
        $arr['name'] = $request->name;
        $arr['slug'] = str_slug($request->name);
        $arr['quantity'] = $request->quantity;
        $arr['accessories'] = $request->accessories;
        $arr['price'] = $request->price;
        $arr['warranty'] = $request->warranty;
        $arr['promotion'] = $request->promotion;
        $arr['condition'] = $request->condition;
        $arr['status'] = $request->status;
        $arr['description'] = $request->description;
        $arr['prod_cate'] = $request->cate;
        $arr['featured'] = $request->featured;
        if($request->hasFile('img')){
            $img = $request->img->getClientOriginalName();
            $arr['img'] = $img;
            $request->img->storeAs('images'.$img);
        }

        $product::where('prod_id',$id)->update($arr);
        return redirect('admin/product');
    	
    }

    public function getDeleteProduct($id) {
        Product::destroy($id);
        return back();
    	
    }
}
