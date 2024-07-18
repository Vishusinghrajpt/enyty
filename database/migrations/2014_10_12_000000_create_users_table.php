<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('role');
            $table->biginteger('role_users')->nullable();
            $table->timestamps();
        });
        
        $current_time=Carbon::now();
        $admin=['id'=>1,'role'=>'admin','role_users'=>null,'created_at'=>$current_time,'updated_at'=>$current_time];
        $user=['id'=>2,'role'=>'user','role_users'=>null,'created_at'=>$current_time,'updated_at'=>$current_time];
        $company=['id'=>3,'role'=>'company','role_users'=>null,'created_at'=>$current_time,'updated_at'=>$current_time];
        
        DB::table('roles')->insert($admin);
        DB::table('roles')->insert($user);
        DB::table('roles')->insert($company);
        
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('avatar')->nullable();
            $table->enum('status', ['0', '1', '2'])->default('0');
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('roles');
    }
};