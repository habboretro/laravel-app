<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->text('description')->nullable();
            $table->double('previous_price', 2)->nullable();
            $table->integer('previous_reward')->nullable();
            $table->boolean('recommended')->default(false);
            $table->string('category')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('previous_price');
            $table->dropColumn('previous_reward');
            $table->dropColumn('recommended');
            $table->dropColumn('category');
        });
    }
}
