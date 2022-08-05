<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Http\Response;

class CartController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): Response {
        $carts = Cart::all();
        $message = null;
        if ($carts) {
            $message = trans('cart.prod_fetch_success');
        } else {
            $message = trans('cart.something_wrong');
        }
        $response = [
            "success" => true,
            "message" => $message,
            "data" => $carts,
        ];
        return response($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): Response {

        $session_id = session()->getId();

        $cartItem = Cart::create($request->all());
        $message = null;
        if ($cartItem) {
            $message = trans('cart.cart_add_success');
        } else {
            $message = trans('cart.something_wrong');
        }
        $response = [
            "success" => true,
            "message" => $message,
            "data" => $cartItem,
        ];
        return response($response, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): Response {

        try {
            $cart = Cart::find($id);
            $cart->update($request->all());
            $message = trans('cart.cart_update_success');
            $response = [
                "success" => true,
                "message" => $message,
                "data" => $cart,
            ];
        } catch (Exception $ex) {
            $response = [
                "success" => false,
                "message" => $ex->getMessage(),
            ];
            return response($response, 204);
        }
        return response($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): Response {
        try {
            Cart::destroy($id);
            $message = trans('cart.cart_delete_success');
            $response = [
                "success" => true,
                "message" => $message,
            ];
        } catch (Exception $ex) {
            $response = [
                "success" => false,
                "message" => $ex->getMessage(),
            ];
        }
        return response($response, 200);
    }

}
