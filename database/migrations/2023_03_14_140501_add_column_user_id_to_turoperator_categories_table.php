<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('turoperator_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->index('user_id', 'turoperator_categories_user_idx');
            $table->foreign('user_id', 'turoperator_categories_user_fk')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('turoperator_categories', function (Blueprint $table) {
            $table->dropForeign('turoperator_categories_user_fk');
            $table->dropColumn('user_id');
        });
    }
};
