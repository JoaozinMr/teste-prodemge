<?php

namespace App\Http\Controllers;

use App\Models\Adresses;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use inertia\Response;

use function PHPSTORM_META\type;

class AdressesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('Adresses/Index', [
            'adresses' => Adresses::with('citizen:id,name')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Adresses/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'adress_type' => 'required|string|max:255',
            'cep' => 'required|string|max:9',
            'street' => 'required|string|max:255',
            'number' => 'required|string|max:10',
            'complement' => 'nullable|string|max:255',
            'neighborhood' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:2',
            'citizen_id' => 'required|integer|exists:citizens,id',
        ]);

        $request->user()->adresses()->create($validated);

        return redirect(route('adresses.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Adresses $adress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Adresses $adress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Adresses $adress): RedirectResponse
    {
        $validated = $request->validate([]);

        $adress->update($validated);

        return redirect(route('adresses.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Adresses $adress): RedirectResponse
    {
        $adress->delete();

        return redirect(route('adresses.index'));
    }
}
