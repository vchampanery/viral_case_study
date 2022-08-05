<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller {

    /**
     * Display a listing of the product.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $products = Product::all();
        $message = null;
        if ($products) {
            $message = trans('product.prod_fetch_success');
        } else {
            $message = trans('product.something_wrong');
        }
        $response = [
            "success" => true,
            "message" => $message,
            "data" => $products,
        ];
        return response($response, 200);
    }

    /**
     * Store a newly created product in storage.
     * 
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response {
        $rules = array(
            'User' => "required|integer",
            'Name' => "required",
            'Price' => "required|integer",
            'Category' => "required|integer",
            'Description' => "required",
            'Avatar' => "file",
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $response = [
                "success" => false,
                "message" => $validator->errors(),
            ];
            return response($response, 404);
        }
        $product = Product::create($request->all());
        $message = null;
        if ($product) {
            $message = trans('product.product_store_success');
        } else {
            $message = trans('product.something_wrong');
        }
        $response = [
            "success" => true,
            "message" => $message,
            "data" => $product,
        ];
        return response($response, 200);
    }

    /**
     * Display the product.
     * 
     * @param type $id
     * @return Response
     */
    public function show($id): Response {
        $product = Product::find($id);
        $message = null;
        if ($product) {
            $message = trans('product.product_fetch_success');
        } else {
            $message = trans('product.product_not_found');
        }
        $response = [
            "success" => true,
            "message" => $message,
            "data" => $product,
        ];
        return response($response, 200);
    }

    /**
     * Update the product in storage.
     * 
     * @param \App\Http\Controllers\Request $request
     * @param type $id
     * @return Response
     */
    public function update(Request $request, $id): Response {
        $product = Product::find($id);
        $message = null;
        if ($product) {
            $message = trans('product.product_fetch_success');
        } else {
            $message = trans('product.product_not_found');
        }
        $rules = array(
            'User' => "required|integer",
            'Name' => "required",
            'Price' => "required|integer",
            'Category' => "required|integer",
            'Description' => "required",
            'Avatar' => "required",
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $response = [
                "success" => false,
                "message" => $validator->errors(),
            ];
            return response($response, 404);
        }
        try {
            $product->update($request->all());
            $response = [
                "success" => true,
                "message" => $message,
                "data" => $product,
            ];
        } catch (Exception $ex) {
            $response = [
                "success" => false,
                "message" => $ex->getMessage(),
                "data" => $product,
            ];
        }

        return response($response, 200);
    }

    /**
     * Remove the specified product from storage.
     * 
     * @param type $id
     * @return Response
     */
    public function destroy($id): Response {
        try {
            Product::destroy($id);
            $message = trans('product.product_delte_success');
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
