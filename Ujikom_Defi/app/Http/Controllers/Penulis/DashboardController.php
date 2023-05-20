<?php

namespace App\Http\Controllers\Penulis;

use Illuminate\Http\Request,
App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('penulis.dbpenulis');
    }
}
