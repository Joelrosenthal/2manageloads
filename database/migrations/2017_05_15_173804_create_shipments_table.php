<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('created_by')->nullable();
            $table->string('customer')->nullable();
            $table->string('urgency')->nullable();
            $table->string('load_type')->nullable();
            $table->string('trailer_type')->nullable();
            $table->string('pick_city')->nullable();
            $table->string('pick_state')->nullable();
            $table->string('pick_date')->nullable();
            $table->string('pick_time')->nullable();
            $table->string('actual_pick_date')->nullable();
            $table->string('actual_pick_time')->nullable();
            $table->string('delivery_city')->nullable();
            $table->string('delivery_state')->nullable();
            $table->string('delivery_date')->nullable();
            $table->string('delivery_time')->nullable();
            $table->string('actual_delivery_date')->nullable();
            $table->string('actual_delivery_time')->nullable();
            $table->string('commodity')->nullable();
            $table->string('special_instructions')->nullable();
            $table->string('length')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('miles')->nullable();
            $table->string('billing_money')->nullable();
            $table->string('offer_money')->nullable();
            $table->string('post_money')->nullable();
            $table->string('company_contact')->nullable();
            $table->string('contact_phone')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('ref_number')->nullable();
            $table->string('po_number')->nullable();
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
        Schema::dropIfExists('shipments');
    }
}
