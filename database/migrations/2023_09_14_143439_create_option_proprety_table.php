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
        Schema::create('option_proprety', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Option::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Proprety::class)->constrained()->cascadeOnDelete();
            $table->primary(['option_id','property_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('option_proprety');
    }
};
