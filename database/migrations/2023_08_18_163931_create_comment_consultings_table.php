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
        Schema::create('comment_consultings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('constalingCard_id');
            $table-> text('message');
            $table-> text('user_name');
            $table->index('constalingCard_id', 'constaling_card_comment_idx');
            $table->foreign('constalingCard_id', 'constaling_card_comment_fk')->on('consulting_posts')->references('id');
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
        Schema::dropIfExists('comment_consultings');
    }
};
