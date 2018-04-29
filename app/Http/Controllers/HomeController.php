<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['atendente', 'especialista']);

        return view('home');
    }

    public function atendente(Request $request)
    {
        $request->user()->authorizeRoles('atendente');
        return view('atendente.home');
    }

    public function especialista(Request $request)
    {
        $request->user()->authorizeRoles('especialista');
        return view('especialista.home');
    }

    public function paciente(Request $request)
    {
        $request->user()->authorizeRoles('paciente');
        return view('paciente.home');
    }
}
