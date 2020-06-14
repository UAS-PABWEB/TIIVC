<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $customers         = Auth::user()->customers;
        $totalCustomerDebt = Auth::user()->customerDebts()->where('status', 0)->sum('nominal');
        $modalTitle        = 'Hapus Pelanggan';
        $modalText         = '';

        return view('backend.index', compact('customers', 'totalCustomerDebt', 'modalTitle', 'modalText'));
    }
}
