<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Site;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function store(Request $request, Branch $branch){
        $site = new Site();
        $site->branch_id = $branch->id;
        $site->name = $request->input('name');
        $site->save();

        return redirect()->route('dashboard::branches::show',$branch)->with('success', 'Tambang berhasil ditambahkan.');
    }
}
