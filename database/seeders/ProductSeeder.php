<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Product::updateOrCreate([
			'user_id'	=> 1,
			'name'		=> 'Samsung A5000'
		], [
			'description'	=> 'Hp Samsung',
			'stok'				=> 10,
			'price'				=> '5000000'
		]);

		Product::updateOrCreate([
			'user_id'	=> 1,
			'name'		=> 'Ipad T1000'
		], [
			'description'	=> 'Tablet Apple',
			'stok'				=> 5,
			'price'				=> '11000000'
		]);

		Product::updateOrCreate([
			'user_id'	=> 2,
			'name'		=> 'Ipad T1000'
		], [
			'description'	=> 'Tablet Apple',
			'stok'				=> 7,
			'price'				=> '10000000'
		]);

		Barang::updateOrCreate([
			'user_id'	=> 2,
			'name'		=> 'Ipad T1000'
		], [
			'description'	=> 'Tablet Apple',
			'stok'				=> 7,
			'price'				=> '10000000'
		]);
	}
}
