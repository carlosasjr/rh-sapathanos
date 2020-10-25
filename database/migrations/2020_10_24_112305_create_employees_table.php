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
            $table->string('name');
            $table->string('email')->nullable();

            $table->string('image')->nullable();

            $table->string('cpf')->nullable();
            $table->string('rg')->nullable();
            $table->date('date_birth')->nullable();

            $table->string('cellphone')->nullable();
            $table->string('telephone')->nullable();

            $table->string('partner')->nullable();
            $table->enum('marital_status', ['Solteiro', 'Casado', 'Separado', 'Divorciado', 'Viúvo'])->nullable();
            $table->string('father')->nullable();
            $table->string('mother')->nullable();
            $table->string('naturalness')->nullable();
            $table->string('nationality')->nullable();
            $table->string('office')->nullable();

            $table->string('street')->nullable();
            $table->string('number')->nullable();
            $table->string('district')->nullable();
            $table->string('complement')->nullable();
            $table->string('cep')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();

            $table->string('salary')->nullable();
            $table->time('hours')->nullable();

            $table->date('admission')->nullable();
            $table->date('resignation')->nullable();


            $table->text('observation')->nullable();
            $table->enum('status', ['A', 'I'])->default('A')->comment('A -> Ativo, I -> Inativo');


            $table->bigInteger('user_id')->unsigned();


            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');


            $table->softDeletes();
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
        Schema::dropIfExists('employees');
    }
}
