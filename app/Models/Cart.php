<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
		protected $guarded = [];

		public function product()
		{
			// M -> 1
			return $this->belongsTo(Product::class,'product_id');
		}
}
