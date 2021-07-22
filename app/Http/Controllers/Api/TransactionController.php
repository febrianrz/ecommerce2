<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
	public function index(Request $request)
	{
	}

	/** Proses Checkout */
	public function store(Request $request)
	{
		$request->validate([
			'user_id'					=> 'required|exists:users,id',
			'payment_method'	=> 'required',
		]);

		$user_id = $request->user_id;

		/** Membuat Invoice */
		$tr 									= new Transaction;
		$tr->fill($request->only([
			'user_id',
			'payment_method'
		]));

		$tr->invoice_no 			= "INV-" . date('YmdHis');
		$tr->status 					= "Pending";
		$tr->save();

		/** Ambil semua cart user yang statusnya Pending */
		$carts = Cart::where('user_id', $user_id)
			->where('status', 'Pending')
			->get();

		foreach ($carts as $cart) {
			$tr_detail 									= new TransactionDetail();
			$tr_detail->transaction_id 	= $tr->id;
			$tr_detail->chart_id 				= $cart->id;
			$tr_detail->product_id 			= $cart->product_id;
			$tr_detail->quantity 				= $cart->quantity;
			$tr_detail->price 					= $cart->product->price;
			$tr_detail->description 		= '';
			$tr_detail->save();

			$cart->status = "Success";
			$cart->save();
		}

		return [
			'message'	=> "Berhasil Membuat Transaksi"
		];
	}
}
