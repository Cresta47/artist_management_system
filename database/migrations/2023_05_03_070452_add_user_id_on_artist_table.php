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
        Schema::table('artist', function (Blueprint $table) {
            $table->bigInteger("user_id")->unsigned();

            $table->index("user_id");
            $table->foreign("user_id")->references("id")->on("user")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('artist', function (Blueprint $table) {
            $table->dropIndex("user_id");
            $table->dropForeign(["user_id"]);
            $table->dropColumn("user_id");
        });

    }
};
