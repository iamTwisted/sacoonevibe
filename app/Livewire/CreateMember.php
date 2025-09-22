<?php

namespace App\Livewire;

use App\Models\Member;
use App\Models\MemberShare;
use App\Models\Product;
use App\Models\ShareTransaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Livewire\Component;

class CreateMember extends Component
{
    public $member;
    public $products;
    public $product_id;
    public $shares_count;
    public $share_value;
    public $total_amount;

    public function mount(Member $member)
    {
        $this->member = $member;
        $this->products = Product::where('is_share_product', true)->get();
    }

    public function render()
    {
        return view('livewire.create-member');
    }

    public function recordSharePayment()
    {
        $this->validate([
            'product_id' => 'required|exists:products,id',
            'shares_count' => 'required|numeric|min:1',
        ]);

        $product = Product::find($this->product_id);
        $this->share_value = $product->share_price;
        $this->total_amount = $this->shares_count * $this->share_value;

        $memberShare = MemberShare::create([
            'member_id' => $this->member->id,
            'product_id' => $this->product_id,
            'shares_count' => $this->shares_count,
            'share_value' => $this->share_value,
            'total_amount' => $this->total_amount,
            'status' => 'pending',
        ]);

        // This is where you would integrate with an external accounting module
        // For now, we will just mark the shares as paid and create a transaction

        $memberShare->update(['status' => 'active']);

        ShareTransaction::create([
            'member_share_id' => $memberShare->id,
            'tx_type' => 'purchase',
            'amount' => $this->total_amount,
            'shares_count' => $this->shares_count,
            'created_by' => Auth::id(),
        ]);

        session()->flash('message', 'Share payment recorded successfully.');
    }

    public function approveMember()
    {
        $canDeferPayment = Config::get('sacco.defer_share_payment', false);
        $memberShares = $this->member->shares;

        if (!$canDeferPayment && $memberShares->where('status', '!=', 'active')->count() > 0) {
            session()->flash('error', 'Cannot approve member until all share payments have been recorded.');
            return;
        }

        $this->member->update(['status' => 'active']);

        session()->flash('message', 'Member approved successfully.');
    }
}
