<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Account;

class AccountsController extends Controller
{
    public function index()
    {
        return Inertia::render('accounts/Index', [
            'accounts' => auth()->user()->accounts
        ]);
    }

    public function create()
    {
        return Inertia::render('accounts/Create', []);
    }

    public function store(Request $request)
    {
        Account::create([
            'user_id' => $request->user()->id,
            'name' => $request->input('name'),
            'company' => $request->input('company'),
            'type' => $request->input('type')
        ]);

        return redirect()->route('accounts.index');
    }
}
