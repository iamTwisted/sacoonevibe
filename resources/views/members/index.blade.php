@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Members</h1>
        <div class="card">
            <div class="card-body">
                @livewire('members.member-list')
            </div>
        </div>
    </div>
@endsection
