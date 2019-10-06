<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members_profiles', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('fullname', 100);
            $table->string('icnumber', 12)->unique();
            $table->string('phone', 12);
            $table->string('schoolcode', 7)->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('members_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members_profiles');
    }
}
