<?php
// app/Models/Product.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'description', 'price', 'stock'];

    public function categories() {
        return $this->belongsToMany(Category::class, 'category_product');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}