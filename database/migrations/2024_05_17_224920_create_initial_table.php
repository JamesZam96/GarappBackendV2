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
        // Tabla 'people'
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname');
            $table->string('address');
            $table->integer('phoneNumber');
            $table->string('email');
            $table->timestamps();
        });

        // Tabla 'vehicles'
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('delivery_id')->nullable();
            $table->string('brand');
            $table->string('model');
            $table->integer('year');
            $table->string('plate');
            $table->string('type');
            $table->timestamps();
        });

        // Tabla 'customers'
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('people_id')->nullable();
            $table->timestamps();

            // Definiendo claves foráneas
            $table->foreign('people_id')->references('id')->on('people')->onDelete('cascade')->onUpdate('cascade');
        });

        // Tabla 'warehouses'
        Schema::create('warehouses', function (Blueprint $table) {
            $table->id();
            $table->integer('nit');
            $table->string('name');
            $table->string('address');
            $table->string('email');
            $table->bigInteger('phone');
            $table->unsignedBigInteger('people_id')->nullable();
            $table->timestamps();

            $table->foreign('people_id')->references('id')->on('people')->onDelete('cascade')->onUpdate('cascade');

        });

        // Tabla 'categories'
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });

        // Tabla 'products'
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->integer('price');
            $table->timestamps();
            $table->foreignId('warehouse_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
        });

        // Tabla pivote 'category_product'
        Schema::create('category_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('category_id');
            $table->timestamps();

            // Definiendo claves foráneas
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });

         // Tabla 'workshops'
        Schema::create('workshops', function (Blueprint $table) {
            $table->id();
            $table->integer('nit');
            $table->string('name');
            $table->string('address');
            $table->string('email');
            $table->bigInteger('phone');
            $table->unsignedBigInteger('people_id')->nullable();
            $table->timestamps();

            $table->foreign('people_id')->references('id')->on('people')->onDelete('cascade')->onUpdate('cascade');

        });

        // Tabla 'services'
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->integer('price');
            $table->unsignedBigInteger('workshops_id')->nullable();
            $table->timestamps();

            $table->foreign('workshops_id')->references('id')->on('workshops')->onDelete('cascade')->onUpdate('cascade');

        });

        // Tabla 'orders'
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('customer_id');
            $table->string('state');
            $table->integer('quantity');
            $table->integer('unitprice');
            $table->integer('subtotal');
            $table->timestamps();

            // Definiendo claves foráneas
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade')->onUpdate('cascade');
        });

        // Tabla pivote 'order_product'
        Schema::create('order_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->timestamps();

            // Definiendo claves foráneas
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade')->onUpdate('cascade');
        });

        // Tabla pivote 'order_service'
        Schema::create('order_service', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_id')->nullable();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->timestamps();

            // Definiendo claves foráneas
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade')->onUpdate('cascade');
        });

        // Tabla 'bills'
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->double('totalprice');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->timestamps();

            // Definiendo claves foráneas
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade')->onUpdate('cascade');
        });

        // Tabla 'delivery'
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->integer('licenseNumber');
            $table->unsignedBigInteger('people_id')->nullable();
            $table->unsignedBigInteger('vehicle_id')->nullable();
            $table->timestamps();

            // Definiendo claves foráneas
            $table->foreign('people_id')->references('id')->on('people')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade')->onUpdate('cascade');
        });
        
      
    }

    /**
     * Revertir las migraciones.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
        Schema::dropIfExists('vehicles');
        Schema::dropIfExists('customers');
        Schema::dropIfExists('warehouses');
        Schema::dropIfExists('products');
        Schema::dropIfExists('services');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('bills');
        Schema::dropIfExists('deliveries');
        Schema::dropIfExists('category_product');
        Schema::dropIfExists('order_product');
        Schema::dropIfExists('order_service');
        Schema::dropIfExists('workshops');
    }
};
