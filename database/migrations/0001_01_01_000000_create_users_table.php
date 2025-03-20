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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('email', 255)->unique();
            $table->string('phone', 255);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 255);
            $table->string('remember_token', 100)->nullable();
            $table->enum('role', ['admin', 'supervisor', 'employee', 'driver'])->default('employee');
            $table->enum('gender', ['male', 'female']);
            $table->enum('is_active', ['1', '0'])->default('1');
            $table->string('profile')->nullable();
            $table->timestamps();
        });


        DB::table('users')->insert([
            [
                'name' => 'John UWAYO',
                'email' => 'admin@vsms.com',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'is_active' => '1',
                'gender' => 'male',
                'phone' => '0780000001',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Alice Johnson',
                'email' => 'supervisor@vsms.com',
                'password' => Hash::make('password123'),
                'role' => 'supervisor',
                'is_active' => '1',
                'gender' => 'male',
                'phone' => '0780000003',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'employee@vsms.com',
                'password' => Hash::make('password123'),
                'role' => 'employee',
                'is_active' => '1',
                'gender' => 'female',
                'phone' => '0780000002',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Johnson SANGANO',
                'email' => 'Johnson@vsms.com',
                'password' => Hash::make('password123'),
                'role' => 'driver',
                'is_active' => '1',
                'gender' => 'female',
                'phone' => '0780000004',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
