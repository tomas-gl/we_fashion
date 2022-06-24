<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

	protected $fillable = [
		'category_id',
		'name',
		'description',
		'price',
		'size',
		'picture',
		'published',
		'discount',
		'reference',
		'created_at',
		'updated_at',
	];
}
