<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30)->nullable(false);
            $table->string('username', 50)->nullable(false);
            $table->string('email', 100)->nullable(false)->unique("email_unique_key");
            $table->string('address',150)->nullable(false);
            $table->string('phone_number',50)->nullable(false);
            $table->string('manager',50)->nullable(true);
            $table->boolean('is_active')->nullable(false);
            $table->unsignedBigInteger('department_id')->nullable(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
