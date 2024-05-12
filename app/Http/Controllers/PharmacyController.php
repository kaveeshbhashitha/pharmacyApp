<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prescription;

class PharmacyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function pharmacyQuotation()
    {
        return view('pharmacy.prescription');
    }

    public function seeAllPresc(){
        $prescription = Prescription::all();

        return $prescription;
    }

    public function acceptQuotation()
    {
        return view('pharmacy.accept');
    }

    public function declineQuotation()
    {
        return view('pharmacy.declined');
    }

    public function addQuotation()
    {
        return view('pharmacy.addquotation');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard');
    }

    /**
     * Store a newly created resource in storage.
     */
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
        $prescription = Prescription::findOrFail($id);
        return view('pharmacy.addquotation', compact('prescription'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'email' => 'required|string|max:255',
                'code' => 'required|string|max:255',
                'telephone' => 'required|string|max:255',
                'department' => 'required|string|max:255',
                'faculty' => 'required|string|max:255',
                'university' => 'required|string|max:255',
                'profileurl' => 'required|string|max:255',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
            ]);
    
            $staff = Prescription::findOrFail($id);
    
            // Update employee data
            $staff->title = $request->input('title');
            $staff->firstname = $request->input('firstname');
            $staff->lastname = $request->input('lastname');
            $staff->email = $request->input('email');
            $staff->code = $request->input('code');
            $staff->telephone = $request->input('telephone');
            $staff->department = $request->input('department');
            $staff->faculty = $request->input('faculty');
            $staff->university = $request->input('university');
            $staff->profileurl = $request->input('profileurl');
    
            // Check if a new photo has been uploaded
            if ($request->hasFile('image')) {
                $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
                $path = $request->file('image')->storeAs('img', $fileName, 'public');
                $staff->image = '/storage/' . $path;
            }
    
            // Save the changes to the database
            $staff->save();
    
            return redirect()->route('adminpeoplestaff')->with('success', 'Staff updated successfully');
        } 
        catch (\Exception $e) 
        {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $staff = Prescription::findOrFail($id);
        $staff->delete();

        return redirect()->route('pharmacyQuotation')->with('success', 'Prescription deleted successfully');
    }
}
