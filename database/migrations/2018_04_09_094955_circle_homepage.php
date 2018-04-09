<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CircleHomepage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('circles', function (Blueprint $table) {
            $table->string('webpage')->nullable()->after('description');
            $table->string('image')->after('webpage')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('circles', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->dropColumn('webpage');
        });
    }
}
