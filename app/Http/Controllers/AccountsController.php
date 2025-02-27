<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AccountsController extends Controller
{
    public function index()
    {
        return Inertia::render('Accounts', [
            'accounts' => auth()->user()->accounts
        ]);
    }
}
