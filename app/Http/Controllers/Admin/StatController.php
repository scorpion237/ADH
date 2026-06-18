<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stat;
use Illuminate\Http\Request;

class StatController extends Controller
{
    public function index()
    {
        $stats = Stat::orderBy('sort_order', 'asc')->get();
        return view('admin.stats.index', compact('stats'));
    }

    public function create()
    {
        return view('admin.stats.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'icon' => 'required|string|max:255', // ex: fas fa-heart
            'sort_order' => 'required|integer|min:0',
        ]);

        Stat::create($validated);

        return redirect()->route('admin.stats.index')
            ->with('success', 'Statistique créée avec succès !');
    }

    public function edit(Stat $stat)
    {
        return view('admin.stats.edit', compact('stat'));
    }

    public function update(Request $request, Stat $stat)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'sort_order' => 'required|integer|min:0',
        ]);

        $stat->update($validated);

        return redirect()->route('admin.stats.index')
            ->with('success', 'Statistique mise à jour avec succès !');
    }

    public function destroy(Stat $stat)
    {
        $stat->delete();

        return redirect()->route('admin.stats.index')
            ->with('success', 'Statistique supprimée avec succès !');
    }
}
