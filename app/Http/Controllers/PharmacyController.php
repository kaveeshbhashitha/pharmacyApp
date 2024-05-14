<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prescription;

class PharmacyController extends Controller
{
    public function pharmacyQuotation()
    {
        return view('pharmacy.prescription');
    }

    public function seeAllPresc(){
        $prescription = Prescription::all();
        return $prescription;
    }

    public function addQuotation()
    {
        return view('pharmacy.addquotation');
    }

    public function create()
    {
        return view('dashboard');
    }

    public function store(Request $request)
    {
        try {
            // Validate if image1 is uploaded
            if ($request->hasFile('image1')) {
                $requestdata = $request->all();
                
                // Upload image1
                $fileName1 = time() . $request->file('image1')->getClientOriginalName();
                $path1 = $request->file('image1')->storeAs('img', $fileName1, 'public');
                $requestdata['image1'] = '/storage/' . $path1;
        
                // Upload image2 if provided
                if ($request->hasFile('image2')) {
                    $fileName2 = time() . $request->file('image2')->getClientOriginalName();
                    $path2 = $request->file('image2')->storeAs('img', $fileName2, 'public');
                    $requestdata['image2'] = '/storage/' . $path2;
                }
        
                // Upload image3 if provided
                if ($request->hasFile('image3')) {
                    $fileName3 = time() . $request->file('image3')->getClientOriginalName();
                    $path3 = $request->file('image3')->storeAs('img', $fileName3, 'public');
                    $requestdata['image3'] = '/storage/' . $path3;
                }
        
                // Upload image4 if provided
                if ($request->hasFile('image4')) {
                    $fileName4 = time() . $request->file('image4')->getClientOriginalName();
                    $path4 = $request->file('image4')->storeAs('img', $fileName4, 'public');
                    $requestdata['image4'] = '/storage/' . $path4;
                }
        
                // Upload image5 if provided
                if ($request->hasFile('image5')) {
                    $fileName5 = time() . $request->file('image5')->getClientOriginalName();
                    $path5 = $request->file('image5')->storeAs('img', $fileName5, 'public');
                    $requestdata['image5'] = '/storage/' . $path5;
                }
        
                // Create Prescription with the data
                Prescription::create($requestdata);
                
                return redirect('dashboard')->with('success', 'Prescription added successfully');
            } else {
                // Handle case where image1 is not uploaded
                return redirect()->back()->with('error', 'Please upload at least one prescription image');
            }
        } catch (\Exception $e) {
            // Handle any exception that occurs
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function edit(string $id)
    {
        $prescription = Prescription::findOrFail($id);
        return view('pharmacy.addquotation', compact('prescription'));
    }

    public function destroy(string $id)
    {
        $staff = Prescription::findOrFail($id);
        $staff->delete();

        return redirect()->route('pharmacyQuotation')->with('success', 'Prescription deleted successfully');
    }
}
