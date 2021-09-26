<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeUsersFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nid', 256)->change();
            $table->string('city', 256)->change();
            $table->string('postal_code', 256)->change();
            $table->string('organization', 256)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nid')->change();
            $table->string('city')->change();
            $table->string('postal_code', 10)->change();
            $table->string('organization')->change();
        });
    }
}
