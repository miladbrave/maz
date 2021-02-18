<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->string('path',255);
            $table->string('original_name',255);
            $table->unsignedBigInteger('product_id')->nullable()->default(null);
            $table->unsignedBigInteger('slider_id')->nullable()->default(null);
            $table->unsignedBigInteger('banner_id')->nullable()->default(null);
            $table->unsignedBigInteger('blog_id')->nullable()->default(null);
            $table->bigInteger('user_id');
            $table->foreign('product_id')->references('id')->on('products')
                                        ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('blog_id')->references('id')->on('blogs')
                                         ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('banner_id')->references('id')->on('banners')
                                            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('slider_id')->references('id')->on('sliders')
                                            ->onDelete('cascade')->onUpdate('cascade');


            //create relation with slide and banner and ads
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
        Schema::dropIfExists('photos');
    }
}
