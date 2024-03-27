<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InvoiceRequest;
use App\Mail\InvoiceCreated;
use App\Models\Invoice;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoice = Invoice::get();
        // dd($invoice);
        return view('dashboard', compact('invoice'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $invoice = null;
        return view('invoice.invoiceForm', \compact('invoice'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InvoiceRequest $request)
    {
        try {
            $total_amount = $request->quantity * $request->amount;
            $tax_amount = ($total_amount * $request->percentage) / 100;
            $net_amount = $total_amount + $tax_amount;
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads'), $filename);
            }

            Invoice::create([
                'name'         => $request->name,
                'date'         => $request->date,
                'email'        => $request->email,
                'amount'       => $request->amount,
                'total_amount' => $total_amount,
                'quantity'     => $request->quantity,
                'tax_amount'   => $tax_amount,
                'percentage'   => $request->percentage,
                'net_amount'   => $net_amount,
                'file_path'    => $filename ?? null,
            ]);
            $filePath = $request->hasFile('file') ? $request->file('file')->getPathname() : null;

            Mail::to($request->email)->send(new InvoiceCreated($request->date, $tax_amount, $request->amount, $filePath));
            return \to_route('dashboard');
        } catch (Exception $e) {
            dd($e);
            return \redirect()->back();
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
    public function edit(Invoice $invoice)
    {
        return view('invoice.invoiceForm', \compact('invoice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $total_amount = $request->quantity * $request->amount;
            $tax_amount = ($total_amount * $request->percentage) / 100;
            $net_amount = $total_amount + $tax_amount;

            $invoice = Invoice::findOrFail($id); 

            $invoice->name = $request->name;
            $invoice->date = $request->date;
            $invoice->email = $request->email;
            $invoice->amount = $request->amount;
            $invoice->total_amount = $total_amount;
            $invoice->quantity = $request->quantity;
            $invoice->tax_amount = $tax_amount;
            $invoice->percentage = $request->percentage;
            $invoice->net_amount = $net_amount;

            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads'), $filename);
                $invoice->file_path = $filename;
            }

            $invoice->save();
            return \to_route('dashboard');
        } catch (Exception $e) {
            return \redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        try {
            $invoice->delete();
            return redirect()->route('invoices.index');
        } catch (Exception $e) {
            return \redirect()->back();
        }
    }
}
