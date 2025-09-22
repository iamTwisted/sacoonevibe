@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Loan Types') }}</div>

                    <div class="card-body">
                        <a href="{{ route('loan-types.create') }}" class="btn btn-primary mb-3">Add Loan Type</a>

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Interest Rate</th>
                                <th>Repayment Period</th>
                                <th width="280px">Action</th>
                            </tr>
                            @foreach ($loanTypes as $loanType)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $loanType->name }}</td>
                                <td>{{ $loanType->interest_rate }}</td>
                                <td>{{ $loanType->repayment_period }}</td>
                                <td>
                                    <form action="{{ route('loan-types.destroy',$loanType->id) }}" method="POST">

                                        <a class="btn btn-info" href="{{ route('loan-types.show',$loanType->id) }}">Show</a>

                                        <a class="btn btn-primary" href="{{ route('loan-types.edit',$loanType->id) }}">Edit</a>

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>

                        {!! $loanTypes->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
