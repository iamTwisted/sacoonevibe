<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:members.view')->only('index');
        $this->middleware('permission:members.create')->only(['create', 'store']);
        $this->middleware('permission:members.update')->only(['edit', 'update']);
        $this->middleware('permission:members.approve')->only('approve');
    }

    public function index()
    {
        return view('members.index');
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        // Store logic here
    }

    public function show(Member $member)
    {
        return view('members.profile', compact('member'));
    }

    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        // Update logic here
    }

    public function approve(Member $member)
    {
        $this->authorize('approve', $member);

        $member->update(['status' => 'active']);

        return redirect()->route('members.show', $member)->with('success', 'Member has been approved.');
    }
}
