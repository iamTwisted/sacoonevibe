<?php

namespace App\Http\Livewire\Members;

use App\Models\Member;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateMember extends Component
{
    use WithFileUploads;

    public $step = 1;

    // Step 1: Personal Info
    public $first_name;
    public $middle_name;
    public $last_name;
    public $dob;
    public $gender;
    public $id_type;
    public $id_number;
    public $kra_pin;
    public $nin;
    public $email;
    public $phone;
    public $physical_address;
    public $postal_address;
    public $photo;
    public $signature;

    // Step 2: Shares
    public $share_products = [];
    public $shares = [];

    // Step 3: Savings Enrollment
    public $savings_products = [];
    public $savings = [];

    // Step 4: Beneficiaries
    public $beneficiaries = [];

    protected function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'dob' => 'required|date|before_or_equal:' . now()->subYears(config('sacco.min_age', 18)),
            'gender' => 'required|in:male,female,other',
            'id_type' => 'required|string|max:255',
            'id_number' => ['required', 'string', 'unique:members,id_number'],
            'kra_pin' => 'nullable|string|max:255',
            'nin' => 'nullable|string|max:255',
            'email' => ['required', 'email', 'unique:members,email'],
            'phone' => ['required', 'string', 'unique:members,phone'],
            'physical_address' => 'required|string',
            'postal_address' => 'nullable|string',
            'photo' => 'required|image|max:1024', // 1MB Max
            'signature' => 'required|image|max:1024', // 1MB Max
            'shares.*.product_id' => 'required|exists:products,id',
            'shares.*.quantity' => 'required|integer|min:1',
            'beneficiaries.*.name' => 'required|string|max:255',
            'beneficiaries.*.relationship' => 'required|string|max:255',
            'beneficiaries.*.phone' => 'required|string',
            'beneficiaries.*.allocation' => 'required|numeric|min:0|max:100',
        ];
    }

    public function mount()
    {
        $this->share_products = Product::where('type', 'share')->get();
        $this->savings_products = Product::where('type', 'savings')->get();
        $this->beneficiaries[] = ['name' => '', 'relationship' => '', 'phone' => '', 'allocation' => ''];
    }

    public function nextStep()
    {
        $this->validate($this->getStepRules());
        $this->step++;
    }

    public function previousStep()
    {
        $this->step--;
    }

    public function addBeneficiary()
    {
        $this->beneficiaries[] = ['name' => '', 'relationship' => '', 'phone' => '', 'allocation' => ''];
    }

    public function removeBeneficiary($index)
    {
        unset($this->beneficiaries[$index]);
        $this->beneficiaries = array_values($this->beneficiaries);
    }

    public function submit()
    {
        $this->validate();

        if (collect($this->beneficiaries)->sum('allocation') != 100) {
            $this->addError('beneficiaries', 'The sum of all beneficiary allocations must be 100%.');
            return;
        }

        DB::transaction(function () {
            $member = Member::create([
                'first_name' => $this->first_name,
                'middle_name' => $this->middle_name,
                'last_name' => $this->last_name,
                'dob' => $this->dob,
                'gender' => $this->gender,
                'id_type' => $this->id_type,
                'id_number' => $this->id_number,
                'kra_pin' => $this->kra_pin,
                'nin' => $this->nin,
                'email' => $this->email,
                'phone' => $this->phone,
                'physical_address' => $this->physical_address,
                'postal_address' => $this->postal_address,
                'status' => 'pending',
                'branch_id' => auth()->user()->branch_id,
                'created_by' => auth()->id(),
            ]);

            $photoPath = $this->photo->store('member-photos', 'public');
            $signaturePath = $this->signature->store('member-signatures', 'public');

            $member->documents()->createMany([
                ['document_type' => 'photo', 'file_path' => $photoPath],
                ['document_type' => 'signature', 'file_path' => $signaturePath],
            ]);

            foreach ($this->shares as $share) {
                $member->shares()->create([
                    'product_id' => $share['product_id'],
                    'quantity' => $share['quantity'],
                    'status' => 'pending',
                ]);
            }

            foreach ($this->beneficiaries as $beneficiary) {
                $member->beneficiaries()->create($beneficiary);
            }

            $this->emit('member.created');
        });

        return redirect()->route('members.index')->with('success', 'Member created successfully.');
    }

    public function render()
    {
        return view('livewire.members.create-member');
    }

    private function getStepRules()
    {
        switch ($this->step) {
            case 1:
                return [
                    'first_name' => 'required|string|max:255',
                    'last_name' => 'required|string|max:255',
                    'dob' => 'required|date|before_or_equal:' . now()->subYears(config('sacco.min_age', 18)),
                    'gender' => 'required|in:male,female,other',
                    'id_type' => 'required|string|max:255',
                    'id_number' => ['required', 'string', Rule::unique('members', 'id_number')],
                    'email' => 'required|email|unique:members,email',
                    'phone' => 'required|string|unique:members,phone',
                    'physical_address' => 'required|string',
                    'photo' => 'required|image|max:1024',
                    'signature' => 'required|image|max:1024',
                ];
            case 2:
                return [
                    'shares.*.product_id' => 'required|exists:products,id',
                    'shares.*.quantity' => 'required|integer|min:1',
                ];
            case 4:
                return [
                    'beneficiaries.*.name' => 'required|string|max:255',
                    'beneficiaries.*.relationship' => 'required|string|max:255',
                    'beneficiaries.*.phone' => 'required|string',
                    'beneficiaries.*.allocation' => 'required|numeric|min:0|max:100',
                ];
            default:
                return [];
        }
    }
}
