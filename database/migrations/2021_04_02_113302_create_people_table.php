<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('ipId');
            $table->string('philhealth');
            $table->string('dswd_household');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('extension');
            $table->enum('sex', ['MALE', 'FEMALE']);
            $table->enum('birthreg', ['YES', 'NO']);
            $table->date('birthdate');
            $table->string('region');
            $table->string('province');
            $table->string('municipality');
            $table->string('barangay');
            $table->string('sitio');
            $table->string('ethnicity');
            $table->string('education');
            $table->string('relhh');
            $table->string('community');
            $table->enum('isIP', [0,1]);
            $table->string('head');
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
        Schema::dropIfExists('people');
    }
}
