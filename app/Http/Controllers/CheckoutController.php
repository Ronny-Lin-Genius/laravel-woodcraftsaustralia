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
        // $billing = null;
        // if(session('billing') != null){
        //     $billing = session('billing');
        // }
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
            // 'billing_address_collection' => 'required',
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
