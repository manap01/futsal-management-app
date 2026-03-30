<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Court;
use Illuminate\Http\Request;

class CourtController extends Controller
{
    public function index()
    {
        $courts = Court::all();
        return view('admin.courts.index', compact('courts'));
    }

    public function create()
    {
        return view('admin.courts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'price_per_hour' => 'required|numeric',
            'description' => 'required',
            'image' => 'required',
        ]);

        Court::create($request->all());

        return redirect()->route('admin.courts.index')->with('success', 'Lapangan berhasil ditambahkan!');
    }

    public function edit(Court $court)
    {
        return view('admin.courts.edit', compact('court'));
    }

    public function update(Request $request, Court $court)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'price_per_hour' => 'required|numeric',
            'description' => 'required',
            'image' => 'required',
        ]);

        $court->update($request->all());

        return redirect()->route('admin.courts.index')->with('success', 'Lapangan berhasil diperbarui!');
    }

    public function destroy(Court $court)
    {
        $court->delete();
        return redirect()->route('admin.courts.index')->with('success', 'Lapangan berhasil dihapus!');
    }
}
