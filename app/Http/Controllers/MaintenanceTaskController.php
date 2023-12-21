<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MaintenanceTaskController extends Controller
{
    public function create(Request $request)
    {
        $response = Http::post(env('RUBY_SERVICE_BASE_URL') . '/maintenance_tasks', $request->all());

        if ($response->successful()) {
            return back()->with('success', 'Maintenance task successfully added!');
        } else {
            return back()->withErrors('Something went wrong.');
        }
    }

    public function update($id, Request $request)
    {
        $response = Http::put(env('RUBY_SERVICE_BASE_URL') . "/maintenance_tasks/{$id}", $request->all());

        if ($response->successful()) {
            return back()->with('success', 'Maintenance task updated successfully!');
        } else {
            return back()->withErrors('Something went wrong.');
        }
    }
}
