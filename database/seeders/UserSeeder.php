<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// User::insert([
		User::updateOrCreate([
			'email'								=> 'febrianrz@alterindonesia.com',
		], [
			'name'								=> 'Tester',
			'email_verified_at'		=> date('Y-m-d H:i:s'),
			'password'						=> bcrypt("asdfasdf")
		]);

		// User::insert([
		User::updateOrCreate([
			'email'								=> 'umar@alterindonesia.com',
		], [
			'name'								=> 'Umar',
			'email_verified_at'		=> date('Y-m-d H:i:s'),
			'password'						=> bcrypt("asdfasdf")
		]);

		// User::insert([
		User::updateOrCreate([
			'email'								=> 'khalid@alterindonesia.com',
		], [
			'name'								=> 'Khalid',
			'email_verified_at'		=> date('Y-m-d H:i:s'),
			'password'						=> bcrypt("asdfasdf")
		]);

		User::updateOrCreate([
			'email'								=> 'udin@alterindonesia.com',
		], [
			'name'								=> 'Udin',
			'email_verified_at'		=> date('Y-m-d H:i:s'),
			'password'						=> bcrypt("asdfasdf")
		]);

		User::updateOrCreate([
			'email'								=> 'arip@alterindonesia.com',
		], [
			'name'								=> 'Arip',
			'email_verified_at'		=> date('Y-m-d H:i:s'),
			'password'						=> bcrypt("asdfasdf")
		]);
	}
}
