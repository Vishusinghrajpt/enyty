<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;
use App\Models\EternityPages;
use App\Helpers\ModelUtility;
use Stripe\Stripe;
use Stripe\Invoice;

class InvoicesController extends Controller
{
    public function invoices(Request $request){
        if ($request->ajax()) {
            $query = Auth::user()->donationHistories()->getQuery();
            
            $params = $request->all();

            if (isset($params['searchName'])) {
                $searchTerm = $params['searchName'];
                $query->where(function ($query) use ($searchTerm) {
                    $query->where('fullName', 'like',  $searchTerm . '%');
                });
            }
    
            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('name', function ($row) {
                    $name = '<span>' . $row->fullName . '</span>';
                    return $name;
                })
                ->addColumn('creation_at', function ($row) {
                    $created_at = date('d/m/Y', strtotime($row->created_at));
                    return $created_at;
                })
                ->addColumn('download', function ($row) {
                    // $url = route('company.invoiceDownload', ['donationId' => $row->donationId]);
                    return '<a class="text-dark" href="#">Download</a>';
                })
                ->rawColumns([ 'name', 'creation_at', 'download'])
                ->make(true);
        }

        return view('company.invoices.invoice');
    }
    
    public function invoiceDownload(Request $request){
       $customerId = $request->donationId;
        
        if($customerId){ 
            
            $stripe = new \Stripe\StripeClient('sk_test_51PT8F0Rvk0BGFPWhXcLoWpm9VYpzZYH5ioLQQkSpTQfyhOgegkoMe7L9j4676xVgeox7vF51HOiHXdCja134gijV00xyoJbS1x');
            $test =  $stripe->invoices->create(['customer' => $customerId]);
            $invoiceId = $test->id;
            $invoice = $stripe->invoices->retrieve($invoiceId, []);
           print_r($invoice);
           $pdf = $invoice->invoice_pdf;
            dd($pdf);
            // $temporaryUrl = Stripe::apiBase() . $pdf;
        
            // Use Laravel's response helper to force download the PDF
            // return response()->streamDownload(function () use ($temporaryUrl) {
            //     readfile($temporaryUrl);
            // }, 'invoice.pdf');
       }
    }
}
