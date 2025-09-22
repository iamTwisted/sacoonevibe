<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\LoanType;
use App\Models\User;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loans = Loan::with('member', 'loanType')->latest()->paginate(5);

        return view('loans.index', compact('loans'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $members = User::all();
        $loanTypes = LoanType::all();
        return view('loans.create', compact('members', 'loanTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required|exists:users,id',
            'loan_type_id' => 'required|exists:loan_types,id',
            'amount' => 'required|numeric',
            'status' => 'required|in:pending,approved,rejected,paid',
        ]);

        Loan::create($request->all());

        return redirect()->route('loans.index')
                        ->with('success','Loan created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Loan $loan)
    {
        return view('loans.show',compact('loan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Loan $loan)
    {
        $members = User::all();
        $loanTypes = LoanType::all();
        return view('loans.edit',compact('loan', 'members', 'loanTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Loan $loan)
    {
        $request->validate([
            'member_id' => 'required|exists:users,id',
            'loan_type_id' => 'required|exists:loan_types,id',
            'amount' => 'required|numeric',
            'status' => 'required|in:pending,approved,rejected,paid',
        ]);

        $loan->update($request->all());

        return redirect()->route('loans.index')
                        ->with('success','Loan updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loan $loan)
    {
        $loan->delete();

        return redirect()->route('loans.index')
                        ->with('success','Loan deleted successfully');
    }
}
