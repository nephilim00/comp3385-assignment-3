<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index()
{
    $clients = Client::all(); // Use the correct namespace if Client is not imported
    return view('dashboard', compact('clients'));
}

}
