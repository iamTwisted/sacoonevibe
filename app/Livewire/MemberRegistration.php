<?php

namespace App\Livewire;

use Livewire\Component;

class MemberRegistration extends Component
{
    public $step = 1;
    public $state = [];

    public function render()
    {
        return view('livewire.member-registration');
    }

    public function nextStep()
    {
        $this->validateData();
        $this->step++;
    }

    public function previousStep()
    {
        $this->step--;
    }

    public function submit()
    {
        $this->validateData();
        // Submit the form
    }

    private function validateData()
    {
        if ($this->step == 1) {
            $this->validate([
                'state.first_name' => 'required',
                'state.last_name' => 'required',
                'state.date_of_birth' => 'required|date',
                'state.gender' => 'required',
            ]);
        } elseif ($this->step == 2) {
            $this->validate([
                'state.phone_number' => 'required',
                'state.email' => 'required|email',
                'state.address' => 'required',
            ]);
        } elseif ($this->step == 3) {
            $this->validate([
                'state.next_of_kin_name' => 'required',
                'state.next_of_kin_relationship' => 'required',
                'state.next_of_kin_phone_number' => 'required',
            ]);
        } elseif ($this->step == 4) {
            $this->validate([
                'state.nominee_name' => 'required',
                'state.nominee_relationship' => 'required',
                'state.nominee_phone_number' => 'required',
            ]);
        }
    }
}
