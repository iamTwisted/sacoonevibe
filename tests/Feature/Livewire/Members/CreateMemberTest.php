<?php

namespace Tests\Feature\Livewire\Members;

use App\Http\Livewire\Members\CreateMember;
use App\Models\User;
use App\Models\Branch;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Livewire\Livewire;
use Tests\TestCase;

class CreateMemberTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_component_can_render()
    {
        $this->actingAs($user = User::factory()->create());

        $component = Livewire::test(CreateMember::class);

        $component->assertStatus(200);
    }

    /** @test */
    public function it_can_create_a_member()
    {
        $this->actingAs($user = User::factory()->create());

        Product::factory()->create(['type' => 'share', 'name' => 'Normal Shares']);

        $photo = UploadedFile::fake()->image('photo.jpg');
        $signature = UploadedFile::fake()->image('signature.jpg');

        Livewire::test(CreateMember::class)
            ->set('first_name', 'John')
            ->set('last_name', 'Doe')
            ->set('dob', '1990-01-01')
            ->set('gender', 'male')
            ->set('id_type', 'National ID')
            ->set('id_number', '12345678')
            ->set('email', 'john.doe@example.com')
            ->set('phone', '+1234567890')
            ->set('physical_address', '123 Main St')
            ->set('photo', $photo)
            ->set('signature', $signature)
            ->call('nextStep')
            ->set('shares', [
                1 => ['product_id' => 1, 'quantity' => 10]
            ])
            ->call('nextStep')
            ->call('nextStep')
            ->set('beneficiaries', [
                ['name' => 'Jane Doe', 'relationship' => 'Wife', 'phone' => '+0987654321', 'allocation' => 100]
            ])
            ->call('submit')
            ->assertRedirect('/members');

        $this->assertDatabaseHas('members', [
            'email' => 'john.doe@example.com',
            'status' => 'pending',
        ]);

        $this->assertDatabaseHas('member_documents', [
            'document_type' => 'photo',
        ]);

        $this->assertDatabaseHas('member_shares', [
            'product_id' => 1,
            'quantity' => 10,
            'status' => 'pending',
        ]);

        $this->assertDatabaseHas('beneficiaries', [
            'name' => 'Jane Doe',
        ]);
    }
}
