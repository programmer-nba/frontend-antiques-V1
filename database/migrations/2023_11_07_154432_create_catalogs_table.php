<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id');
            $table->string('locale');
            $table->string('locale_id');
            $table->string('title');
            $table->string('description');
            $table->string('image');
            $table->string('view_type');
            $table->string('seo_title');
            $table->string('seo_description');
            $table->string('seo_keyword');
            $table->string('seo_image');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('catalogs');
    }
}
