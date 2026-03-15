<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if(Auth::check()){
        return redirect('/dashboard');
    }

    return view('login');
});

Route::get('/login', function () {

    if(Auth::check()){
        return redirect('/dashboard');
    }

    return view('login');
});

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', function (\Illuminate\Http\Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return response()->json([
        'success' => true,
        'message' => 'Logout realizado com sucesso'
    ]);
})->middleware('auth');

Route::get('/dashboard', function () {
    if(!Auth::check()){
        return redirect('/login');
    }

    return view('/dashboard');
});

Route::get('/pessoas', function () {
    if(!Auth::check()){
        return redirect('/login');
    }

    return view('/pessoas');
});