<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('property_id');
            $table->string('title');
            $table->string('address');
            $table->string('type');
            $table->integer('cost');
            $table->integer('bed_rooms');
            $table->integer('bath_rooms');
            $table->integer('area');
            $table->longText('description');
            $table->date('available_from');
            $table->integer('first_month');
            $table->integer('security_deposit');
            $table->integer('broker_fee');
            $table->string('image_urls');
            $table->string('is_featured');
            $table->string('contact_person');
            $table->string('contact_number');
            $table->string('status');
            $table->string('search_tags');
            $table->string('created_by');
            $table->string('updated_by');
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
        Schema::dropIfExists('properties');
    }
}
