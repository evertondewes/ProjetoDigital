<?php

namespace ProjetoDigital\Http\Controllers\Api;

use ProjetoDigital\Models\State;
use ProjetoDigital\Http\Controllers\Controller;

class StatesController extends Controller
{
    public function index()
    {
        return State::orderBy('name')->get();
    }

    public function showCities(State $state)
    {
        return $state->cities()->orderBy('name')->get();
    }
}
