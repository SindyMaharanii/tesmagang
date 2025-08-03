<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
public function showProfile()
{
    return view('profile.show', [
        'user' => Auth::user(),
        'products' => Auth::user()->products // Jika ingin menampilkan produk user
    ]);
}
    public function index()
    {
        return redirect()->route('products.index');
    }
}