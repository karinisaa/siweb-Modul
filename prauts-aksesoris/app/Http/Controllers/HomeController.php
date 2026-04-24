<?php
// app/Http/Controllers/HomeController.php
namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller {
    public function index() {
        $products = Product::with('categories')->get();
        return view('home', compact('products'));
    }
}