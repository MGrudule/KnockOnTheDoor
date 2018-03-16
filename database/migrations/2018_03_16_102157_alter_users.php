<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('summary')->after('is_administrator');

            $table->integer('profile_id')->unsigned()->nullable()->after('summary');
            $table->foreign('profile_id')->references('id')->on('profiles');

            $table->integer('circle_id')->unsigned()->nullable()->after('profile_id');
            $table->foreign('circle_id')->references('id')->on('circles');
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
            $table->dropColumn('summary');

            $table->dropForeign('users_profile_id_foreign');
            $table->dropColumn('profile_id');

            $table->dropForeign('users_circle_id_foreign');
            $table->dropColumn('circle_id');
        });
    }

}
