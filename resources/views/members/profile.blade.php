@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ $member->profile_photo_url }}" alt="{{ $member->first_name }}" class="rounded-circle" width="150">
                            <h4 class="mt-3">{{ $member->first_name }} {{ $member->last_name }}</h4>
                            <p class="text-muted">{{ $member->member_no }}</p>
                        </div>
                        <hr>
                        <p><strong>Branch:</strong> {{ $member->branch->name }}</p>
                        <p><strong>Status:</strong> {{ $member->status }}</p>
                        <p><strong>Phone:</strong> {{ $member->phone }}</p>
                        <p><strong>Email:</strong> {{ $member->email }}</p>
                        <p><strong>ID Number:</strong> {{ $member->id_number }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @livewire('members.member-profile', ['member' => $member])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
