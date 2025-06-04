<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Endereço do pedido
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('zipcode');
            $table->string('country')->default('Brasil');

            $table->enum('status', ['pendente', 'processando', 'enviado', 'entregue', 'cancelado'])->default('pendente');
            $table->decimal('total_amount', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
