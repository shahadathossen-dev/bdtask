<?php

namespace App\Http\Controllers;

use App\Models\Adjustment;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdjustmentRequest;
use App\Models\Product;

class AdjustmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adjustments.index', ['adjustments' => Adjustment::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adjustments.create', ['products' => Product::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\AdjustmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdjustmentRequest $request, Adjustment $adjustment)
    {
        $newResource = Adjustment::create($request->only($adjustment->fillable));

        return back()->with('message', 'Resource created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Adjustment  $adjustment
     * @return \Illuminate\Http\Response
     */
    public function show(Adjustment $adjustment)
    {
        return view('adjustments.show', ['adjustment' => $adjustment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Adjustment  $adjustment
     * @return \Illuminate\Http\Response
     */
    public function edit(Adjustment $adjustment)
    {
        return view('adjustments.edit', ['adjustment' => $adjustment, 'products' => Product::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\AdjustmentRequest  $request
     * @param  \App\Models\Adjustment  $adjustment
     * @return \Illuminate\Http\Response
     */
    public function update(AdjustmentRequest $request, Adjustment $adjustment)
    {
        $updated = $adjustment->update($request->only($adjustment->fillable));

        return back()->with('message', 'Resource updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Adjustment  $adjustment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Adjustment $adjustment)
    {
        $deleted = $adjustment->delete();
        return back()->with('message', 'Resource deleted successfully');
    }
}
