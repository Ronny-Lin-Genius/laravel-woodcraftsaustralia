<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index(){
        $in_cart_products = [];
        if(session('products') != null){
            foreach (session('products') as $product){
                // check qutity greater than 0
                if($product['quantity'] >= 1){                    
                    $in_cart_products[] = $product;
                } else {     
                    $this->destroy($product['product_id']);
                }
            }
        }
        return view('cart')->with('in_cart_products', $in_cart_products);
        // //prepare for session variable
        // $line_items = [];
        // foreach($products as $product){
        //     $price_data = [
        //         'currency' => 'aud',
        //         'product_data' => [
        //             'name' => $product['name'],
        //             'description' => $product['desc'],
        //             'images' => ['http://localhost/storage/images/' . $product['image']]],
        //         'unit_amount' => $product['price'] * 100];
        //     $line_items[] = [
        //         'price_data' => $price_data,
        //         'quantity' => $product['pivot']['quantity']];
        // }
        // //create stripe session variable
        // if(session('products')){
        //     \Stripe\Stripe::setApiKey('sk_test_51GsMzhD2QcqvamdPHNty89zT5OctwKMyXdxRnPS3MJt5DubkDAYkVA5vuDsdNKcRoljrhUaP6kPOtbEJiULiRLvm00QqHwC2Yt');
        //     $session = \Stripe\Checkout\Session::create([
        //         'customer_email' => 'Ronny@gmail.com',
        //         'billing_address_collection' => 'required',
        //         'payment_method_types' => ['card'],
        //         'line_items' => $line_items,
        //         'mode' => 'payment',
        //         'success_url' => 'http://localhost/home?session_id={CHECKOUT_SESSION_ID}',
        //         'cancel_url' => 'http://localhost/home']);
        // } else {
        //     $session = [];
        // }
        // return view('cart')->with('in_cart_products', $products)->with('session', $session);
    }

    public function create(Request $request){
        $id = $request->id;
        $product = Product::find($id)->toArray();
        $product['attribute'] = $request->artribute;
        $product['quantity'] = 1;
        $product['image'] = explode(', ', $product['image']);
        session()->push('products', $product);
        return redirect()->route('cart.index');
    }

    public function update(Request $request){
        $product_ids = $request->product_id;
        $quantitys = $request->quantity;
        $products = session('products');
        $index = 0;
        $reorgnized_products = [];
        foreach($products as $product){
            $reorgnized_products[] = $product;
        }
        foreach($quantitys as $quantity){
            $reorgnized_products[$index]['qty'] = $quantity;
            $index +=1;
        }
        session(['products' => $reorgnized_products]);       
        return redirect()->route('cart.index');
    }

    // Caculating the number of items in cart page
    public static function getItemQty(){
        $in_cart_item_number = 0;
        if(session('products')){
            foreach(session('products') as $product){
                $in_cart_item_number = $in_cart_item_number + $product['quantity'];
            }
        }
        return $in_cart_item_number;
    }

    // Caculating total price in cart page
    public static function getTotalPrice(){
        $totalPrice = 0;
        if(session('products')){
            foreach(session('products') as $product){
                $price = $product['price'];
                $quantity = $product['quantity'];
                $totalPrice = $totalPrice + $price * $quantity;
            }
        }
        return $totalPrice;
    }
}
