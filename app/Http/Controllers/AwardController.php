<?php

namespace App\Http\Controllers;
use App\Models\Awards;
use Illuminate\Http\Request;

class AwardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $awards = Awards::all();
        return view('award.index')
            ->with('awards', $awards);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('award.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postCreate(Request $request)
    {
        $name = $request->get('award');
        $branchNew = new Awards();
        $branchNew->fill($name);
        $branchNew->save();
        return redirect('/admin/award');
    }

    public function edit(Request $request, $id)
    {
        $branch = Awards::where('id', $id)->first();

        $test = '1';
        return view('award.edit')
            ->with('branch', $branch)
            ->with('test', $test);
    }

    public function postEdit(Request $request, $id)
    {
        $name = $request->get('award');
        $branchEdit = Awards::where('id', $id)->first();
        $branchEdit->fill($name);
        $branchEdit->save();
        return redirect('/admin/award');
    }
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postDelete(Request $request, $id)
    {
        $branchDelete = Awards::where('id', $id)->first();
        $branchDelete->delete();
        return redirect('/admin/award');
    }
}
