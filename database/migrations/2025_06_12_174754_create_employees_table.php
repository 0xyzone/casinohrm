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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->constrained()->cascadeOnDelete();
            $table->string('employee_code')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('home_phone')->nullable();
            $table->string('mobile_phone')->nullable();
            $table->string('alt_mobile_phone')->nullable();
            $table->string('current_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('date_of_birth_bs')->nullable();
            $table->date('date_of_joining')->nullable();
            $table->string('gender')->nullable();
            $table->string('position')->nullable();
            $table->decimal('salary', 10, 2)->nullable();
            $table->string('status')->default('active');
            $table->string('work_location')->nullable();
            $table->string('id_type')->nullable();
            $table->string('id_number')->nullable();
            $table->string('ssid_number')->nullable();
            $table->string('pan_number')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('employee_location')->nullable();
            $table->string('employee_visa_number')->nullable();
            $table->string('employee_visa_expiry_date')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('driving_license_number')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('father_name')->nullable();
            $table->string('first_emergency_contact_name')->nullable();
            $table->string('first_emergency_contact_phone')->nullable();
            $table->string('first_emergency_contact_relationship')->nullable();
            $table->string('second_emergency_contact_name')->nullable();
            $table->string('second_emergency_contact_phone')->nullable();
            $table->string('second_emergency_contact_relationship')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
