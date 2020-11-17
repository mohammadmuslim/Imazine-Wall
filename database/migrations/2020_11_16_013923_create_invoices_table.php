<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')
                        ->constrained()
                        ->onDelete('cascade');
            $table->date('date')->nullable();
            $table->integer('water_quantity')->nullable();
            $table->integer('water_price')->nullable();
            $table->integer('due_amount')->nullable();
            $table->integer('paid_amount')->nullable();
            $table->integer('total_amount')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
