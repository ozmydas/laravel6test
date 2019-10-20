<?php

namespace App\Http\Controllers;

use App\Example;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $example = Example::latest()->paginate(5);
        return view('example.index', compact('example'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('example.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        Example::create($request->all());

        return redirect()->route('example.index')
        ->with('success', 'Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Example  $example
     * @return \Illuminate\Http\Response
     */
    public function show(Example $example)
    {
        return view('example.show', compact('example'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Example  $example
     * @return \Illuminate\Http\Response
     */
    public function edit(Example $example)
    {
        return view('example.edit', compact('example'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Example  $example
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Example $example)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $example->update($request->all());

        return redirect()->route('example.index')
        ->with('success', 'Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Example  $example
     * @return \Illuminate\Http\Response
     */
    public function destroy(Example $example)
    {
        $example->delete();

        return redirect()->route('example.index')
        ->with('success', 'Deleted Successfully.');
    }
}
