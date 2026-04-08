<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class SiteController extends Controller
{
    public function index()
    {
        $hits = Product::orderBy('id', 'desc')->where('hit', 1)->with('category')->limit(8)->get();
        $news = Product::orderBy('id', 'desc')->where('new', 1)->with('category')->limit(8)->get();
        $sales = Product::orderBy('id', 'desc')->where('sale', 1)->with('category')->limit(16)->get();

        return view('index', compact('hits', 'news', 'sales'));
    }

    public function dashboard()
    {
        $orders = Order::orderBy('id', 'desc')->where('user_id', auth()->id())->get();

        return view('dashboard', compact('orders'));
    }

}
