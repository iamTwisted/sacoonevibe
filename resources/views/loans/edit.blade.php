@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Edit Loan') }}</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('loans.update',$loan->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                             <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Member:</strong>
                                        <select name="member_id" class="form-control">
                                            @foreach ($members as $member)
                                                <option value="{{ $member->id }}" {{ $loan->member_id == $member->id ? 'selected' : '' }}>{{ $member->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Loan Type:</strong>
                                        <select name="loan_type_id" class="form-control">
                                            @foreach ($loanTypes as $loanType)
                                                <option value="{{ $loanType->id }}" {{ $loan->loan_type_id == $loanType->id ? 'selected' : '' }}>{{ $loanType->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Amount:</strong>
                                        <input type="number" name="amount" value="{{ $loan->amount }}" class="form-control" placeholder="Amount" step="0.01">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Status:</strong>
                                        <select name="status" class="form-control">
                                            <option value="pending" {{ $loan->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="approved" {{ $loan->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                            <option value="rejected" {{ $loan->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                            <option value="paid" {{ $loan->status == 'paid' ? 'selected' : '' }}>Paid</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                  <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
