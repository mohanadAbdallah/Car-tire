<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tires', function (Blueprint $table) {
            $table->id();

            $table->integer('type')->nullable()->default(0);
            $table->string('manufacture_company')->nullable();
            $table->string('manufacture_year')->nullable();
            $table->string('rim_type')->nullable();
            $table->string('size')->nullable();
            $table->longText('notes')->nullable();
            $table->string('malfunction_degree')->nullable();
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
        Schema::dropIfExists('tires');
    }
}
