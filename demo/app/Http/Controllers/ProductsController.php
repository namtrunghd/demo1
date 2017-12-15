<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Contracts\Pagination;
use Illuminate\Http\Request;
use DB;
use Validator;
use App\Http\Requests\ProductaddRequest;
use App\Http\Requests\ProducteditRequest;

class ProductsController extends Controller
{
    public function viewProduct() {
    $data = Product::orderBy('id','DESC')->paginate(5);
    return view ( 'view' )->withData ( $data );
	}

    public function getaddProduct(){
        return view('addProduct');
    }

    public function postaddProduct(ProductaddRequest $request){
        $product = new Product;
        $img = $request->file('photo')->getClientOriginalName();
        $product->name = $request->name;
        $product->description =e($request->description);
        $product->price = $request->price;
        $product->photo = $img;
        $request->photo->move('public/upload/img-product',$img);
        $product->save();
        return redirect()->intended('product/viewProduct')->with(['success'=>'Add Product Success!']);
    }

    public function geteditProduct($id){
        $item = Product::find($id)->toArray();
        return view('editProduct',compact('item'));
    }

    public function posteditProduct(ProducteditRequest $request,$id){
        $product = new Product;
        $arr['name'] = $request->name;
        $arr['description'] = $request->description;
        $arr['price'] = $request->price;
        if ($request->hasFile('photo')) {
            $img = $request->file('photo')->getClientOriginalName();
            $arr['photo'] = $img;
            $request->photo->move('public/upload/img-product',$img);
        }
        $product::where('id',$id)->update($arr);
        return redirect('product/viewProduct')->with(['success'=>'Edit Product Success!']);
    }

    public function delProduct($id){
        Product::destroy($id);
        return redirect()->intended('product/viewProduct');
    }
}
