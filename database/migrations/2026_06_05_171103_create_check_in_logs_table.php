<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('check_in_logs', function (Blueprint $table) {
            $table->bigIncrements("id");

            $table->dateTime("in_date");
            $table->string("return_condition",200);

            $table->foreignId("user_dev_id")->constrained("users_devs")
            ->onUpdate("cascade")->onDelete("cascade");

            $table->foreignId("device_inventory_id")->constrained("devices_inventories")
            ->onUpdate("cascade")->onDelete("cascade");


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('check_in_logs');
    }
};
