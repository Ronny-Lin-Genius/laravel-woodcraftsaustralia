<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function infomation(){
        $infomation = null;
        if(session('infomation') != null){
            $infomation = session('infomation');
        }
        return view("checkout1")->with('infomation', $infomation);
    }
    public function postInfomation(Request $request){
        $email = $request->email;
        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $address = $request->address;
        $city = $request->city;
        $country = $request->country;
        $state = $request->state;
        $postcode = $request->postcode;
        $phone = $request->phone;
        $infomation = [
            'email' => $email,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'address' => $address,
            'city' => $city,
            'country' => $country,
            'state' => $state,
            'postcode' => $postcode,
            'phone' => $phone
        ];
        session(['infomation' => $infomation]);
        return view('checkout2')->with('infomation', $infomation);
    }
    public function shipping(){
        $infomation = null;
        if(session('infomation') != null){
            $infomation = session('infomation');
        }
        return view("checkout2")->with('infomation', $infomation);
    }
    public function postShipping(Request $request){
        $infomation = session('infomation');
        $line_items = [];
        foreach(session('products') as $item){
            $line_items[] =
                [
                'price_data' => 
                    [
                    'currency' => 'aud',
                    'product_data' => 
                        [
                        'name' => $item['name'],
                        'images' =>  ['https://www.woodcraftsaustralia.com/wp-content/uploads/2020/09/121599029642_.pic_-e1599029918802.jpg']
                        ],
                    'unit_amount' => $item['price'] * 100,
                    ],
                'quantity' => $item['quantity'],
                ];
        }
        \Stripe\Stripe::setApiKey('sk_test_51GsMzhD2QcqvamdPHNty89zT5OctwKMyXdxRnPS3MJt5DubkDAYkVA5vuDsdNKcRoljrhUaP6kPOtbEJiULiRLvm00QqHwC2Yt');
        $session = \Stripe\Checkout\Session::create([
            'customer_email' => $infomation['email'],
            'payment_method_types' => ['card'],
            'line_items' => $line_items,
            'mode' => 'payment',
            'success_url' => 'http://localhost/home?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => 'http://localhost/checkout/payment',
        ]);
        $infomation = null;
        if(session('infomation') != null){
            $infomation = session('infomation');
        }
        $shipping_method = $request->shipping_method;
        if($shipping_method == "normal"){
            $infomation['shipping_method'] = "normal";
            session(['infomation' => $infomation]);
        } else if($shipping_method == "express"){
            $infomation['shipping_method'] = "express";
            session(['infomation' => $infomation]);
        }
        return view("checkout3")->with('session', $session)->with('infomation', $infomation);
    }
    public function payment(){
        \Stripe\Stripe::setApiKey('sk_test_51GsMzhD2QcqvamdPHNty89zT5OctwKMyXdxRnPS3MJt5DubkDAYkVA5vuDsdNKcRoljrhUaP6kPOtbEJiULiRLvm00QqHwC2Yt');
        $session = \Stripe\Checkout\Session::create([
            'customer_email' => 'Ronny@gmail.com',
            'payment_method_types' => ['card'],
            'line_items' => [[
            'price_data' => [
                'currency' => 'aud',
                'product_data' => [
                    'name' => 'T-shirt',
                ],
                'unit_amount' => 2000,
            ],
            'quantity' => 2,
            ]],
            'mode' => 'payment',
            'success_url' => 'http://localhost/home?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => 'http://localhost/checkout/payment',
        ]);
        $infomation = null;
        if(session('infomation') != null){
            $infomation = session('infomation');
        }
        return view("checkout3")->with('session', $session)->with('infomation', $infomation);
    }

    public function create(){
        require 'vendor/autoload.php';
        // This is your real test secret API key.
        \Stripe\Stripe::setApiKey('sk_test_51GsMzhD2QcqvamdPHNty89zT5OctwKMyXdxRnPS3MJt5DubkDAYkVA5vuDsdNKcRoljrhUaP6kPOtbEJiULiRLvm00QqHwC2Yt');
        function calculateOrderAmount(array $items): int {
        // Replace this constant with a calculation of the order's amount
        // Calculate the order total on the server to prevent
        // customers from directly manipulating the amount on the client
        return 1400;
        }
        header('Content-Type: application/json');
        try {
        // retrieve JSON from POST body
        $json_str = file_get_contents('php://input');
        $json_obj = json_decode($json_str);
        $paymentIntent = \Stripe\PaymentIntent::create([
            'amount' => calculateOrderAmount($json_obj->items),
            'currency' => 'usd',
        ]);
        $output = [
            'clientSecret' => $paymentIntent->client_secret,
        ];
        echo json_encode($output);
        } catch (Error $e) {
        http_response_code(500);
        echo json_encode(['error' => $e->getMessage()]);
        }
    }


    // public function postPayment(Request $request){
    //     $billing = null;
    //     $first_name = $request->first_name;
    //     $last_name = $request->last_name;
    //     $address = $request->address;
    //     $city = $request->city;
    //     $country = $request->country;
    //     $state = $request->state;
    //     $postcode = $request->postcode;
    //     $billing = [
    //         'first_name' => $first_name,
    //         'last_name' => $last_name,
    //         'address' => $address,
    //         'city' => $city,
    //         'country' => $country,
    //         'state' => $state,
    //         'postcode' => $postcode,
    //     ];
    //     session(['billing' => $billing]);
    // }
}
