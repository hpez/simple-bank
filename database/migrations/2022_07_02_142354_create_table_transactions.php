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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('from_card');
            $table->unsignedBigInteger('to_card');
            $table->decimal('amount', 10, 2);
            $table->timestamps();

            $table->foreign('from_card')
                ->references('id')
                ->on('cards')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreign('to_card')
                ->references('id')
                ->on('cards')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
