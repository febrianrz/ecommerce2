<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
	public function index(Request $request)
	{
		// Cara 1
		// $users = User::where('name','Reza')->where('email','')->get();

		// Cara 2
		$users = User::query();
		// if(isset($_GET['address']))

		if ($request->has('address')) $users->where('address', $request->address);
		if ($request->has('name')) $users->where('name', $request->name);

		// Query berdasarkan urutan
		if ($request->has('order_by') && $request->has('order_type')) {
			$users->orderBy($request->order_by, $request->order_type);
		}

		return response()->json([
			'data'	=> $users->get()
		]);
	}

	public function store(Request $request)
	{
		$request->validate([
			'name'			=> 'required|max:255',
			'email'			=> 'required|email|unique:users,email',
			'password'	=> 'required|min:6',
			'phone'			=> 'required|min:10',
			'address'		=> 'required',
			'photo'			=> 'required|file|max:2048'
		]);

		// Cara 1.
		$user = new User();
		$user->fill($request->only([
			'name',
			'email',
			'phone',
			'address'
		]));
		$user->password = bcrypt($request->password);
		// Upload File
		$user->photo 		= $request->file('photo')->store('public/photo');
		// End Upload File
		$user->save();

		return response()->json([
			'message'	=> "Berhasil Menambah Data",
			'data'		=> $user
		]);
		// //Cara 2
		// $user = User::create([
		// 	'name'			=> $request->name,
		// 	'email'			=> $request->email,
		// 	'password' 	=> bcrypt($request->password),
		// 	'phone'			=> $request->phone,
		// 	'address'		=> $request->address,
		// ]);

		// //Cara 3 
		// $user = DB::table('users')->insert([
		// 	'name'			=> $request->name,
		// 	'email'			=> $request->email,
		// 	'password' 	=> bcrypt($request->password),
		// 	'phone'			=> $request->phone,
		// 	'address'		=> $request->address,
		// ]);

		// //Cara 4
		// $user = new User();
		// $user->name = $request->nama_user;
		// $user->email = $request->email_user;
		// $user->address = $request->address_user;
		// $user->phone = $request->phone_user;
		// $user->phone = $_POST['phone_user'];
		// $user->password = bcrypt($request->password_user);
		// $user->save();
	}

	public function show($id)
	{
		$user = User::findOrFail($id);
		// $user = User::find($id);

		return response()->json([
			'data'	=> $user
		]);
	}

	public function update($id, Request $request)
	{
		$request->validate([
			'name'			=> 'required|max:255',
			'email'			=> 'required|email|unique:users,email,' . $id,
			'password'	=> 'nullable|min:6',
			'phone'			=> 'required|min:10',
			'address'		=> 'required'
		]);

		// Cara 1.
		$user = User::findOrFail($id);
		// $user = new User;
		$user->fill($request->only([
			'name',
			'email',
			'phone',
			'address'
		]));
		if ($request->has('password')) {
			$user->password = bcrypt($request->password);
		}
		$user->save();

		return response()->json([
			'message'	=> "Berhasil Mengupdate Data",
			'data'		=> $user
		]);
	}

	public function destroy($id, Request $request)
	{
		$user = User::findOrFail($id);
		$user->delete();

		return response()->json([
			'message'	=> 'Berhasil Menghapus Data',	
			'data'	=> $user
		]);
	}
}
