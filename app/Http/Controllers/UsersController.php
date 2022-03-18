<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    protected $UsersModel;

    public function __construct(Users $user){
        $this->UsersModel = $user;
    }

    // Devuelve la vista register
    public function index() {
        if (Auth::user()->is_admin == 0) {
            return back();
        }
        return view('register');
    }

    // Inserta un nuevo usuario
    public function store(Request $request)
    {
        if (Auth::user()->is_admin == 0) {
            return back();
        }

        $this->UsersModel->insert($request->all());

        if (Session::has('errors')) {
            return redirect('register');
        }
        
        return redirect('dashboard')->with('status', 'Cuenta creada');
    }
}
