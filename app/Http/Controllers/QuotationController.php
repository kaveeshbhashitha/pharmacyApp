<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quotation;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use Illuminate\Support\Facades\Auth;

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

    public function acceptQuotation(){
        $quotation = Quotation::where('status', 'accepted')->get();
        return view('pharmacy.accept')->with('quotation', $quotation);
    }

    public function declinQuotation(){
        $quotation = Quotation::where('status', 'declined')->get();
        return view('pharmacy.declined')->with('quotation', $quotation);
    }

    public function quotationsByUserEmail()
    {
        $userEmail = Auth::user()->email;
        $quotations = Quotation::where('pemail', $userEmail)->get();
        return view('user.quotation', compact('quotations'));
    }

    public function create()
    {
        return view('pharmacy.addquotation');
    }

    public function store(Request $request)
    {
        try {
            $requestdata = $request->all();
            Quotation::create($requestdata);
    
            $this->sendEmail($request);
    
            return redirect()->route('pharmacyQuotation')->with('success', 'Quotation added successfully');
    
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function sendEmail(Request $request)
    {
        // Validate the request data
        if(empty($request->pname) || empty($request->pemail) || empty($request->total) || empty($request->description)) {
            return redirect()->back()->with('error', 'Message could not be sent, All fields are required.');
        }
        
        // Send email
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                
            $mail->isSMTP();                                 
            $mail->Host       = 'smtp.gmail.com';          
            $mail->SMTPAuth   = true;                               
            $mail->Username   = 'pharmaforjob@gmail.com';             
            $mail->Password   = 'isvctupyckgeqdey';                     
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
            $mail->Port       = 465; 

            //Recipients
            $mail->setFrom('pharmaforjob@gmail.com', 'PharmacyApp');
            $mail->addAddress($request->pemail, $request->pname);

            //Content
            $mail->isHTML(true);
            $mail->Subject = "ABC Pharmacy - We are providing new Breath to you.";
            $mail->Body = "Name: {$request->pname}<br>Email: {$request->pemail}<br>Your Quotation:<br> {$request->description}<br>Total Charge: {$request->total}";

            $mail->send();

            return redirect()->back()->with('success', 'Email has been sent successfully!');

        } 
        catch (Exception $e) 
        {
            return redirect()->back()->with('error', "Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
        }
    }

    //Delete quotation
    public function destroy(string $id)
    {
        $quotation = Quotation::findOrFail($id);
        $quotation->delete();

        return redirect()->route('seeIssedQuotation')->with('success', 'Quotation deleted successfully');
    }

    //accept quotation
    public function accept($id)
    {
        $quotation = Quotation::findOrFail($id);
        $quotation->status = 'accepted';
        $quotation->save();

        return redirect()->route('userQuotation')->with('success', 'Quotation accepted to deliver successfully');
    }

    //decline quotation
    public function decline($id)
    {
        $quotation = Quotation::findOrFail($id);
        $quotation->status = 'declined';
        $quotation->save();

        return redirect()->route('userQuotation')->with('success', 'Quotation declined successfully');
    }
}
