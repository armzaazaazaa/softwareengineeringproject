<?php

namespace App\Http\Controllers;

use App\Models\Advisor;
use Illuminate\Http\Request;

class AdvisorController extends Controller
{
    public function index(Request $request)
    {
        $advisor = Advisor::all();
        return view('advisor.index')
            ->with('advisor', $advisor);
    }
    public function create(Request $request)
    {
        return view('advisor.create');
    }
    public function postCreate(Request $request)
    {
        $form = $request->get('type');
        $branchNew = new Advisor();
        $branchNew->fill($form);
        $branchNew->save();
        return redirect('/admin/advisor');
    }
    public function edit(Request $request, $id)
    {
        $branch = Advisor::where('id', $id)->first();
        return view('advisor.edit')
            ->with('branch', $branch);
    }

    public function postEdit(Request $request, $id)
    {
        $form = $request->get('type');
        $branchEdit = Advisor::where('id', $id)->first();
        $branchEdit->fill($form);
        $branchEdit->save();
        return redirect('/admin/advisor');
    }

    public function postDelete(Request $request, $id)
    {
        $branchDelete = Advisor::where('id', $id)->first();
        $branchDelete->delete();
        return redirect('/admin/advisor');
    }
}
