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
        Schema::create('users_devs', function (Blueprint $table) {
             $table->bigIncrements("id");

            $table->enum("rol",["t","s","w"]);
            $table->string("u_name",50);
            $table->string("surname",50);
            $table->enum("gender",["f","m"]);
            $table->string("career",50);
            $table->string("id_num",16)->unique()->index();
            $table->string("contact_num",14)->unique()->index();
            $table->string("address",200);
            $table->dateTime("check_out_date");
            $table->enum("semester",["1","2"]);
            $table->dateTime("devolution_date_due");
            $table->string("device_condition",200);

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
        Schema::dropIfExists('users_devs');
    }
};
