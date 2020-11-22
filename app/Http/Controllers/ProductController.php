<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller {

    public function index() {
        $products = Product::orderBy('name', 'asc')->where('type', 'simple')->orWhere('type', 'variable')->paginate(15);
        $products_collection = $products->getCollection();
        $products_array = $products_collection->toArray();
        $products_images = $products_collection->pluck('image')->map(function($item){
            return explode(',', $item);
        })->toArray();
        $new_products_array = array();
        $i = 0;
        foreach($products_array as $item){
            $item['image'] = $products_images[$i];
            array_push($new_products_array, $item); 
            $i++;           
        }    
        $new_products = new \Illuminate\Pagination\LengthAwarePaginator(
            $new_products_array,
            $products->total(),
            $products->perPage(),
            $products->currentPage(), [
                'path' => \Request::url(),
                'query' => [
                    'page' => $products->currentPage()
                ]
            ]
        );
        return view('store')->with('products', $new_products);
    }

    public function show($id){
        $product = Product::find($id);
        $productImages = $product->productImages->map(function($item, $key){
            return $item['image'];
        });
        $product_images = explode(', ', $product['image']);
        $product['image'] = $product_images;
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
                if($current_product['id'] == $id){
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
        return view('single')->with('product', $product);
    }
}
