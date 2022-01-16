<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use Illuminate\Http\Request;

class SportsController extends Controller
{
    public function index()
    {
        $sports = Sport::paginate(5);

        return view('sports.index', compact('sports'));
    }

    public function edit(Sport $sport)
    {
        return view('sports.edit', compact('sport'));
    }

    public function update()
    {
    }

    public function show(Sport $sport)
    {
        return view('sports.show', compact('sport'));
    }
}
