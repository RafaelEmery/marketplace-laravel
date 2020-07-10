<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    private $product;

    public function __construct(Product $product){
        $this->product = $product;
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $products = $this->product->limit(8)->orderBy('id', 'DESC')->get();

        return view('welcome', compact('products'));
    }
}
