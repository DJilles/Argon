10<?php

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
        Schema::create('devices_inventories', function (Blueprint $table) {
            $table->bigIncrements("id");

            $table->string("inv_num",10);
            $table->string("serial_num",12);
            $table->string("model",20);
            $table->string("inv_condition",200);

            /** Para el nombre de la llave foránea se usa el singular del nombre de la tabla que está en plural  seguido de _id*/
            $table->foreignId("device_type_id")->constrained("devices_types")
            ->onUpdate("cascade")->onDelete("cascade");

            $table->foreignId("brand_id")->constrained("brands")
            ->onUpdate("cascade")->onDelete("cascade");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devices_inventories');
    }
};
