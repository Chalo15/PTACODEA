<?php

namespace App\Http\Controllers;

use App\Models\Athlete;
use App\Models\Sport;
use Illuminate\Http\Request;

class AthletesController extends Controller
{
    public function index()
    {
        // Determinar según por rol cuales atletas retornar.

        $athletes = Athlete::with('user')->paginate(5);

        return view('athletes.index', compact('athletes'));
    }

    public function create()
    {
        $sports = Sport::all();

        return view('athletes.create', compact('sports'));
    }

    public function store()
    {
    }

    public function edit(Athlete $athlete)
    {
        $athlete->with('user');

        return view('athletes.edit', compact('athlete'));
    }

    public function update()
    {
    }
}
