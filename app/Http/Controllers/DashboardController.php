<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    // Se accede por ajax
    public function request(Request $data)
    {
        switch ($data->fichero) {
            case 'ventas':

                break;
            case 'clientes':

                break;
            case 'proveedores':
                
                break;
        }
        return $data->fichero;
    }
}
