<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NullableFieldsInMembers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->string('city')->nullable()->change();
            $table->string('vk')->nullable()->change();
            $table->string('instagram')->nullable()->change();
            $table->string('facebook')->nullable()->change();
            $table->string('twitter')->nullable()->change();
            $table->text('info')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->string('city')->nullable(false)->change();
            $table->string('vk')->nullable(false)->change();
            $table->string('instagram')->nullable(false)->change();
            $table->string('facebook')->nullable(false)->change();
            $table->string('twitter')->nullable(false)->change();
            $table->text('info')->nullable(false)->change();
        });
    }
}
