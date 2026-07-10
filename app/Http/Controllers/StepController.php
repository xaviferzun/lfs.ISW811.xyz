<?php

namespace App\Http\Controllers;

use App\Models\Step;
use Illuminate\Http\Request;

class StepController extends Controller
{
    public function update(Request $request, Step $step)
    {
        // authorization

        $step->update(['completed' => !$step->completed]);

        return back();
    }
}