<?php

namespace App\Http\Controllers;

use App\Models\LoanType;
use Illuminate\Http\Request;

class LoanTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loanTypes = LoanType::latest()->paginate(5);

        return view('loan-types.index', compact('loanTypes'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('loan-types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'interest_rate' => 'required|numeric',
            'repayment_period' => 'required|integer',
        ]);

        LoanType::create($request->all());

        return redirect()->route('loan-types.index')
                        ->with('success','Loan type created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(LoanType $loanType)
    {
        return view('loan-types.show',compact('loanType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LoanType $loanType)
    {
        return view('loan-types.edit',compact('loanType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LoanType $loanType)
    {
        $request->validate([
            'name' => 'required',
            'interest_rate' => 'required|numeric',
            'repayment_period' => 'required|integer',
        ]);

        $loanType->update($request->all());

        return redirect()->route('loan-types.index')
                        ->with('success','Loan type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LoanType $loanType)
    {
        $loanType->delete();

        return redirect()->route('loan-types.index')
                        ->with('success','Loan type deleted successfully');
    }
}
