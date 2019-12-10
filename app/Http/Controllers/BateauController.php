<?php

namespace App\Http\Controllers;

use App\Bateau;
use Illuminate\Http\Request;

class BateauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bateau  $bateau
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $boat= Bateau::where('id_bateau', $id)->get()[0]->toArray();

	if(isset($boat)){
	
    		return view('boat', ['boat' => $boat]);
	}
	else{
		return view('404');
	}
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bateau  $bateau
     * @return \Illuminate\Http\Response
     */
    public function edit(Bateau $bateau)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bateau  $bateau
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bateau $bateau)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bateau  $bateau
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bateau $bateau)
    {
        //
    }
}
