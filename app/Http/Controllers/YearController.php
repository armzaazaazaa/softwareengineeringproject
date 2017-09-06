<?php

namespace App\Http\Controllers;
use App\Models\Year;
use Illuminate\Http\Request;

class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $years = Year::all();
        return view('year.index')
            ->with('years', $years);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('year.create');
    }
    public function postCreate(Request $request)
    {
        $form = $request->get('year');
        $branchNew = new Year();
        $branchNew->fill($form);
        $branchNew->save();
        return redirect('/admin/year');
    }
    public function edit(Request $request, $id)
    {
        $branch = Year::where('id', $id)->first();
        return view('year.edit')
            ->with('branch', $branch);
    }
    public function postEdit(Request $request, $id)
    {
        $form = $request->get('year');
        $branchEdit = Year::where('id', $id)->first();
        $branchEdit->fill($form);
        $branchEdit->save();
        return redirect('/admin/year');
    }
    public function postDelete(Request $request, $id)
    {
        $branchDelete = Year::where('id', $id)->first();
        $branchDelete->delete();
        return redirect('/admin/year');
    }

}