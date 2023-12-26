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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 20)->nullable()->default('null');
            $table->string('last_name', 20)->nullable()->default('null');
            $table->string('gmail', 50)->unique();
            $table->string('phone', 14)->nullable()->default('null');
            $table->string('password', 300);
            $table->string('role')->nullable()->default('Admin');
            $table->string('otp', 20)->nullable();
            $table->string('image', 300)->nullable()->default('null');
            $table->string('address', 300)->nullable()->default('null');
            $table->string('age', 10)->nullable()->default('null');
            $table->string('gender')->nullable()->default('null');
            $table->date('birth_day')->nullable();
            $table->longText('description')->nullable()->default('null');

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();  
;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
