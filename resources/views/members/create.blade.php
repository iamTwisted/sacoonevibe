@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create Member</div>

                    <div class="card-body">
                        @livewire('create-member')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
