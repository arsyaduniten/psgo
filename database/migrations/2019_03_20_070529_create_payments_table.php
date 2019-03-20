<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('payment_id');
            $table->integer('transaction_id');
            $table->string('refno');
            $table->string('auth_code');
            $table->string('status');
            $table->string('err_desc');
            $table->string('signature');
            $table->string('cc_name')->nullable();
            $table->string('cc_no')->nullable();        
            $table->string('bank_name')->nullable();
            $table->string('country')->nullable();
            $table->decimal('amount', 8, 2);
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
        Schema::dropIfExists('payments');
    }
}
