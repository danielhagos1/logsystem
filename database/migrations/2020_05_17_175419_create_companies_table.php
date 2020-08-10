<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')
                  ->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade')->unique();
            $table->string('cname');
            $table->timestamps();
           
      
        });
         Schema::create('company_department', function (Blueprint $table) {
            #$table->primary(['company_id', 'department_id']);
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id')->foreign()
                  ->references('id')
                  ->on('companies')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('department_id')->foreign()
                  ->references('id')
                  ->on('departments')
                  ->onDelete('cascade');;
            $table->timestamps();
           
           
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}