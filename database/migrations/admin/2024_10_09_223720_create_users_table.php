<?php

use App\Models\Admin\User;
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
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->bigInteger('IdEmpleado')->unsigned()->nullable();
            $table->bigInteger('idrole')->unsigned()->default(1);
            $table->foreign('IdEmpleado')->references('IdEmpleado')->on('empleados');
            $table->foreign('idrole')->references('idrole')->on('roles');
            $table->rememberToken();
            $table->timestamps();
        });

        $admin = new User();
        $admin->name = 'lonk';
        $admin->email = 'l0nkdev04@gmail.com';
        $admin->password = '$2y$12$CFxqBNcgE/SfQivyR6.ve.nE1WRYJqSLRRTgSpMj6sLOp0p77Ldzm';
        $admin->remember_token = '$2y$12$CFxqBNcgE/SfQivyR6.ve.nE1WRYJqSLRRTgSpMj6sLOp0p77Ldzm';
        $admin->idrole = 2;
        $admin->save();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
