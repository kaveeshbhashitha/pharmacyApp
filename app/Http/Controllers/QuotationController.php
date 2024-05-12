<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quotation;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //function for web navigation - user Quotation
    public function userQuotation(){
        return view('user.quotation');
    }

    public function seeIssedQuotation(){
        $quotation = Quotation::all();
        return view('pharmacy.quotation')->with('quotation', $quotation);
    }

    public function allQuotations(string $email)
    {
        $quotation = Quotation::where('pemail', $email)->get();
        return $quotation;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pharmacy.addquotation');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $requestdata = $request->all();
            Quotation::create($requestdata);
            return redirect()->route('pharmacyQuotation')->with('success', 'Quotation added successfully');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $quotation = Quotation::findOrFail($id);
        $quotation->delete();

        return redirect()->route('seeIssedQuotation')->with('success', 'Quotation deleted successfully');
    }
}
