<?php

namespace App\Http\Controllers;

use App\Models\ProjectType;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index(Request $request)
    {
        $project_types = ProjectType::all();
       // return $project_types;

        return view('type.index')
            ->with('project_types', $project_types);
    }
    public function create(Request $request)
    {
        return view('type.create');
    }

    public function postCreate(Request $request)
    {
        $form = $request->get('type');
        $branchNew = new ProjectType();
        $branchNew->fill($form);
        $branchNew->save();
        return redirect('/admin/type');
    }
    public function edit(Request $request, $id)
    {
        $branch = ProjectType::where('id', $id)->first();
        return view('type.edit')
            ->with('branch', $branch);
    }

    public function postEdit(Request $request, $id)
    {
        $form = $request->get('type');
        $branchEdit = ProjectType::where('id', $id)->first();
        $branchEdit->fill($form);
        $branchEdit->save();
        return redirect('/admin/type');
    }

    public function postDelete(Request $request, $id)
    {
        $branchDelete = ProjectType::where('id', $id)->first();
        $branchDelete->delete();
        return redirect('/admin/type');
    }
}