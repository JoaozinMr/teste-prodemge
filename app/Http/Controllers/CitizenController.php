<?php

namespace App\Http\Controllers;

use App\Models\Citizen;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use inertia\Response;

class CitizenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): Response
    {
        return Inertia::render('Citizens/Index', [
            'citizens' => Citizen::when($request->term, function ($query, $term) {
                $query->where('name', 'LIKE', '%' . $term . '%')
                    ->orWhere('id', 'LIKE', '%' . $term . '%')
                    ->orWhere('cpf', 'LIKE', '%' . $term . '%');
            })->with('user:id,name')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Citizens/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'social_name' => 'nullable|string|max:255',
            'cpf' => 'required|string|max:14|unique:citizens',
            'email' => 'required|email|max:255|unique:citizens',
            'phone' => 'nullable|string|max:20',
            'father_name' => 'nullable|string|max:255',
            'mother_name' => 'nullable|string|max:255',
        ]);

        $request->user()->citizens()->create($validated);

        return redirect(route('citizens.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): Response
    {
        return Inertia::render('Citizens/Edit', [
            'citizens' => Citizen::where('id', $id)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Citizen $citizen)
    {
        return Inertia::render('Citizens/Edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Citizen $citizen): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'social_name' => 'nullable|string|max:255',
            'cpf' => 'required|string|max:14|unique:citizens',
            'email' => 'required|email|max:255|unique:citizens',
            'phone' => 'nullable|string|max:20',
            'father_name' => 'nullable|string|max:255',
            'mother_name' => 'nullable|string|max:255',
        ]);

        $citizen->update($validated);

        return redirect(route('citizens.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Citizen $citizen): RedirectResponse
    {
        $citizen->delete();

        return redirect(route('citizens.index'));
    }
}
