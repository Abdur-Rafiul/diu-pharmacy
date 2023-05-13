<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicineDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medicine_list_id');
            $table->unsignedBigInteger('pharmacy_id');
            $table->string('medicine_img1')->nullable();
            $table->string('medicine_img2')->nullable();
            $table->string('medicine_img3')->nullable();
            $table->string('medicine_img4')->nullable();
            $table->string('medicine_box')->nullable();
            $table->string('medicine_pis')->nullable();
            $table->string('medicine_status')->nullable();
            $table->enum('medicine_stock', ['available', 'not available', 'rejected'])->default('available');
            $table->string('medicine_price');
            $table->string('medicine_discount');
            $table->text('medicine_description')->nullable();
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
        Schema::dropIfExists('medicine_details');
    }
}
