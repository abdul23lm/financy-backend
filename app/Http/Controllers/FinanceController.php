<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class FinanceController extends Controller
{
    public function store()
    {
        request()->validate([
            'name' => 'required',
            'amount' => 'required|numeric'
        ]);

        $slug = request('name') . "-" . Str::random(6);
        $when = request('when') ?? now();

        Auth::user()->finances()->create([
            'name' => request('name'),
            'slug' => Str::slug($slug),
            'when' => $when,
            'amount' => request('amount'),
            'description' => request('description')
        ]);

        return response()->json([
            'message' => 'The transaction has been saved.'
        ]);
    }
}
