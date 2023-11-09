<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtToDswdSwdaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dswd_swda', function (Blueprint $table) {
            $table->softDeletes(); // This line adds the `deleted_at` column
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dswd_swda', function (Blueprint $table) {
            $table->dropColumn('deleted_at'); // This line removes the `deleted_at` column
        });
    }
}
