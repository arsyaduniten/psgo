<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRefnoToTraveller extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('travellers', function (Blueprint $table) {
            //
            $table->string('refno');
            $table->string('policyno');
            $table->string('plan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('travellers', function (Blueprint $table) {
            //
            $table->dropColumn('refno');
            $table->dropColumn('policyno');
            $table->dropColumn('plan');
        });
    }
}
