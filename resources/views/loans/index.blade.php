@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Loans') }}</div>

                    <div class="card-body">
                        <a href="{{ route('loans.create') }}" class="btn btn-primary mb-3">Add Loan</a>

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Member</th>
                                <th>Loan Type</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th width="280px">Action</th>
                            </tr>
                            @foreach ($loans as $loan)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $loan->member->name }}</td>
                                <td>{{ $loan->loanType->name }}</td>
                                <td>{{ $loan->amount }}</td>
                                <td>{{ $loan->status }}</td>
                                <td>
                                    <form action="{{ route('loans.destroy',$loan->id) }}" method="POST">

                                        <a class="btn btn-info" href="{{ route('loans.show',$loan->id) }}">Show</a>

                                        <a class="btn btn-primary" href="{{ route('loans.edit',$loan->id) }}">Edit</a>

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>

                        {!! $loans->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
