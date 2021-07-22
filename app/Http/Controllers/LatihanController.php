<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LatihanController extends Controller
{
    public function index_1()
		{
			return "Latihan View dari Controller";
		}

		public function index_2($a,$b)
		{
			return "Hasilnya {$a}+{$b} = ".( $a + $b );
		}

		public function index_3($a,$b)
		{
			$total = $a+$b;
			return view('latihan',[
				'x'			=> $a,
				'y'			=> $b,
				'total'	=> $total
			]);
		}

		// public function FunctionName(Type $var = null)
		// {
		// 	return view('admin.dashboard');
		// }
}
