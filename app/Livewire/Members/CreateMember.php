<?php

namespace App\Livewire\Members;

use App\Models\Branch;
use App\Models\Member;
use App\Models\Product;
use Livewire\Component;

class CreateMember extends Component
{
    public $currentStep = 1;
    public $totalSteps = 5;

    // Step 1
    public $branch_id;
    public $member_type;
    public $name;
    public $id_number;
    public $phone;
    public $email;
    public $dob;
    public $gender;
    public $postal_address;
    public $postal_code;
    public $town;
    public $country;

    // Step 2
    public $monthly_contribution;
    public $retirement_age;

    // Step 3
    public $products;
    public $selectedProducts = [];

    // Step 4
    public $beneficiaries = [];

    public function render()
    {
        $branches = Branch::all();
        $this->products = Product::all();

        return view('livewire.members.create-member', [
            'branches' => $branches,
            'products' => $this->products,
        ]);
    }

    public function nextStep()
    {
        $this->currentStep++;
    }

    public function previousStep()
    {
        $this->currentStep--;
    }

    public function addBeneficiary()
    {
        $this->beneficiaries[] = ['name' => '', 'relationship' => '', 'phone' => '', 'id_number' => '', 'allocation' => ''];
    }

    public function removeBeneficiary($index)
    {
        unset($this->beneficiaries[$index]);
        $this->beneficiaries = array_values($this->beneficiaries);
    }

    public function submit()
    {
        $this->validate([
            'branch_id' => 'required',
            'member_type' => 'required',
            'name' => 'required',
            'id_number' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'dob' => 'required|date',
            'gender' => 'required',
            'monthly_contribution' => 'required|numeric',
            'retirement_age' => 'required|numeric',
        ]);

        $member = Member::create([
            'branch_id' => $this->branch_id,
            'member_type' => $this->member_type,
            'name' => $this->name,
            'id_number' => $this->id_number,
            'phone' => $this->phone,
            'email' => $this->email,
            'dob' => $this->dob,
            'gender' => $this->gender,
            'postal_address' => $this->postal_address,
            'postal_code' => $this->postal_code,
            'town' => $this->town,
            'country' => $this->country,
            'monthly_contribution' => $this->monthly_contribution,
            'retirement_age' => $this->retirement_age,
        ]);

        $member->products()->attach($this->selectedProducts);

        foreach ($this->beneficiaries as $beneficiary) {
            $member->beneficiaries()->create($beneficiary);
        }

        return redirect()->route('members.show', $member);
    }
}
