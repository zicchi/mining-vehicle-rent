<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::all();
        return view('pages.branch.index', compact('branches'));
    }

    public function create()
    {
        return view('pages.branch.form', ['branch' => new Branch()]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        Branch::create($validatedData);

        return redirect()->route('dashboard::branches::index')->with('success', 'Cabang berhasil ditambahkan.');
    }

    public function show(Branch $branch)
    {
        return view('pages.branch.show', compact('branch'));
    }

    public function edit(Branch $branch)
    {
        return view('pages.branch.form', compact('branch'));
    }

    public function update(Request $request, Branch $branch)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        $branch->update($validatedData);

        return redirect()->route('dashboard::branches::index')->with('success', 'Cabang berhasil diperbarui.');
    }

    public function destroy(Branch $branch)
    {
        $branch->delete();

        return redirect()->route('dashboard::branches::index')->with('success', 'Cabang berhasil dihapus.');
    }
}
