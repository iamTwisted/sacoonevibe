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
            $table->string('member_no')->unique()->nullable();
            $table->foreignUuid('branch_id')->constrained('branches')->onDelete('cascade');
            $table->string('name');
            $table->string('member_type');
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
            $table->decimal('monthly_contribution', 10, 2)->nullable();
            $table->integer('retirement_age')->nullable();
            $table->enum('status', ['pending', 'active', 'dormant', 'suspended', 'terminated'])->default('pending');
            $table->string('scheme_type')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
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
