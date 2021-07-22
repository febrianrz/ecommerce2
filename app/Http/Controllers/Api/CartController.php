<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function store(Request $request)
		{
			$request->validate([
				'user_id'			=> 'required|exists:users,id',
				'product_id'	=> 'required|exists:products,id',
				'description'	=> 'nullable',
				'quantity'		=> 'required'
			]);

			// $cart = new Cart;
			// $cart->fill($request->only([
			// 	'user_id',
			// 	'product_id',
			// 	'description',
			// 	'quantity'
			// ]));
			// $cart->status = "Pending";
			// $cart->save();

			Cart::updateOrCreate([
				'user_id'	=> $request->user_id,
				'product_id'	=> $request->product_id
			],[
				'description'	=> $request->description,
				'quantity'	=> $request->quantity,
			]);

			return [
				'message'	=> "Berhasil menambahkan cart"
			];
		}
}
