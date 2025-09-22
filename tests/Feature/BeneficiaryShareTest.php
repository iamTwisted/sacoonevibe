<?php

namespace Tests\Feature;

use App\Models\Member;
use App\Models\Beneficiary;
use App\Livewire\BeneficiaryForm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class BeneficiaryShareTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function total_share_percentage_cannot_exceed_100()
    {
        $member = Member::factory()->create();
        Beneficiary::factory()->create(['member_id' => $member->id, 'share_percent' => 50]);

        Livewire::test(BeneficiaryForm::class, ['member_id' => $member->id])
            ->set('name', 'Test Beneficiary')
            ->set('id_type', 'National ID')
            ->set('id_number', '123456789')
            ->set('phone', '123456789')
            ->set('address', '123 Test Street')
            ->set('share_percent', 51)
            ->set('type', 'primary')
            ->call('save')
            ->assertHasErrors(['share_percent']);
    }

    /** @test */
    public function for_retirement_scheme_total_share_must_be_100()
    {
        $member = Member::factory()->create(['scheme_type' => 'retirement']);
        Beneficiary::factory()->create(['member_id' => $member->id, 'share_percent' => 50]);

        $this->assertFalse($member->canSubmitBeneficiaries());

        Beneficiary::factory()->create(['member_id' => $member->id, 'share_percent' => 50]);

        $this->assertTrue($member->fresh()->canSubmitBeneficiaries());
    }
}
