<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('members', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('member_no')->unique();
            $table->foreignUuid('branch_id')->constrained('branches')->onDelete('cascade');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->date('dob');
            $table->string('gender');
            $table->string('id_type')->nullable();
            $table->string('id_number')->unique()->nullable();
            $table->string('kra_pin')->nullable();
            $table->string('nin')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('physical_address')->nullable();
            $table->text('postal_address')->nullable();
            $table->enum('status', ['pending', 'active', 'dormant', 'suspended', 'terminated'])->default('pending');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->foreignId('approved_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamp('approved_at')->nullable();
            $table->json('meta')->nullable();
            $table->timestamps();

            $table->index('phone');
            $table->index('created_by');
            $table->index('approved_by');
            $table->index('branch_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
