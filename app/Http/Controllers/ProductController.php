<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller {
    public function index() {
        $products = Product::all()->toArray();
        return view('store')->with('products', $products);
    }
    public function show($id){
        $product = Product::find($id);
        $productImages = $product->productImages->map(function($item, $key){
            return $item['image'];
        });
        //check variation of the product
        // $variations = $product->variations->all();
        // if ($variations) {
        //     foreach ($variations as $variation){
        //         $var[] = $variation -> toArray();
        //     };
        //     $product['variation'] = $var;
        // } else {
        //     $product['variation'] = [];
        // }
        // dd($product->toArray());

        //check in-cart state of the product
        $product['in_cart'] = 0;
        if(session('products')){
            foreach(session('products') as $current_product){
                if($current_product['product_id'] == $id){
                    $product['in_cart'] = 1;
                }
            }
        }
        // check the type of the product
        // if ($product['type'] == 'variable') {
        //     $variationProduct = $product->variationProducts->map(function ($item, $key) {
        //         return $item;
        //     });
        // }
        return view('single')->with('product', $product->toArray());
    }
}
