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
        Schema::create('music', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("artist_id")->unsigned();
            $table->string("title");
            $table->string("album_name");
            $table->enum("genre", ["rnb", "country", "classic", "rock", "jazz"]);
            $table->timestamps();

            $table->index("artist_id");
            $table->foreign("artist_id")->references("id")->on("artist")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('music');
    }
};
