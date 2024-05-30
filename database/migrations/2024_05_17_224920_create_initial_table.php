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
        // Tabla 'roles'
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();           
             $table->text('description');
            $table->timestamps();
        });
        // Tabla 'users'
        Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->string('name');
                $table->string('lastname');
                $table->string('address');
                $table->string('phone');
                $table->rememberToken();
                $table->timestamps();
                $table->unsignedBigInteger('role_id')->nullable();
                $table->foreign('role_id')->references('id')->on('roles');
        });

       
        // Tabla 'warehouses'
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name_company');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('nit')->unique();
            $table->string('owner_name');
            $table->string('owner_lastname');
            $table->string('owner_dni');
            $table->string('person_type');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone');
            $table->string('address');
            $table->bolean('termns_and_conditions');
            $table->bolean('processing_of_personal_data');
            $table->string('address');
            $table->string('hour_open');
            $table->string('hour_close');
            $table->string('rut');
            $table->string('account_holder_name');
            $table->string('account_holder_lastname');
            $table->string('bank_name');
            $table->string('account_type');
            $table->string('account_number');
            $table->string('owner_address');
            $table->string('pdf_bank_certificate')->nullable();
            $table->string('pdf_dni_owner')->nullable();
            $table->unsignedBigInteger('role_id')->nullable();
            $table->foreign('role_id')->references('id')->on('roles');
            $table->timestamps();
        });
         // Tabla 'vehicles'
         Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            
            $table->string('brand');
            $table->string('model');
            $table->integer('year');
            $table->string('plate');
            $table->string('type');
            $table->string('soat');
            $table->string('transit_license');
            $table->timestamps();
            $table->foreign('delivery_id')->references('id')->on('deliveries');

        });
         // Tabla 'delivery'
         Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname');
            $table->string('phone');
            $table->string('city');
            $table->string('country');
            $table->string('gender');
            $table->string('date_born');
            $table->string('vehicle_type');
            $table->string('dni');
            $table->string('dni_document_front');
            $table->string('dni_document_back');
            $table->string('email')->unique();
            $table->string('password')->unique();
            $table->timestamps();
            $table->string('driving_license')->nullable();
            $table->string('photo')->nullable();
            $table->unsignedBigInteger('delivery_id')->nullable();
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles');
           
        });
         // Tabla 'orders'
         Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('delivery_id')->nullable();

            $table->enum('status', ['pending', 'completed', 'canceled'])->default('pending');
            $table->timestamps();

            // Definiendo claves foráneas
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('delivery_id')->references('id')->on('deliveries')->onDelete('cascade')->onUpdate('cascade');
        });
         // Tabla 'products'
         Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('price');
            $table->string('photo');
            $table->string('stock_quantity');
            $table->unsignedBigInteger('company_id')->nullable();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->timestamps();
        });

        // Tabla 'services'
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('price');
            $table->string('photo');
            $table->unsignedBigInteger('company_id')->nullable();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->timestamps();
        });
        // Tabla 'categories'
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });
        // Tabla pivote 'order_product'
        Schema::create('order_product', function (Blueprint $table) {
            $table->id();
            $table->integer('total_amount');
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

        // Tabla 'customers'
        /*Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('people_id')->nullable();
            $table->timestamps();

            // Definiendo claves foráneas
            $table->foreign('people_id')->references('id')->on('people')->onDelete('cascade')->onUpdate('cascade');
        });*/

        
        

       

        // Tabla pivote 'category_product'
        Schema::create('category_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->timestamps();

            // Definiendo claves foráneas
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
        // Tabla pivote 'category_service'
        Schema::create('category_service', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('service_id')->nullable();
            $table->timestamps();

            // Definiendo claves foráneas
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
        });


         // Tabla 'workshops'
        /*Schema::create('workshops', function (Blueprint $table) {
            $table->id();
            $table->integer('nit');
            $table->string('name');
            $table->string('address');
            $table->string('email');
            $table->bigInteger('phone');
            $table->unsignedBigInteger('people_id')->nullable();
            $table->timestamps();

            $table->foreign('people_id')->references('id')->on('people')->onDelete('cascade')->onUpdate('cascade');

        });*/

        

       

   

        



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

       
        ////////////////////////////
        
        
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();            
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('roles_permissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('permission_id');
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('roles_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('role_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('roles_companies', function (Blueprint $table) {
           $table->id();
           $table->unsignedBigInteger('role_id');
           $table->unsignedBigInteger('company_id');
           $table->timestamps();
           
           $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade')->onUpdate('cascade');
        });

        /*Schema::create('roles_warehouses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('warehouses_id');
            $table->unsignedBigInteger('role_id');
            $table->timestamps();
            
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');            
            $table->foreign('warehouses_id')->references('id')->on('warehouses')->onDelete('cascade')->onUpdate('cascade');
        });*/

        Schema::create('roles_deliveries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('delivery_id');
            $table->unsignedBigInteger('role_id');
            $table->timestamps();
            
            $table->foreign('delivery_id')->references('id')->on('deliveries')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('roles_customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('role_id');
            $table->timestamps();
            
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade')->onUpdate('cascade');
        });

    

    /**
     * Revertir las migraciones.
     */


        ///////////////////
      
    }

    /**
     * Revertir las migraciones.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
        Schema::dropIfExists('vehicles');
        Schema::dropIfExists('customers');
        Schema::dropIfExists('products');
        Schema::dropIfExists('services');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('bills');
        Schema::dropIfExists('deliveries');
        Schema::dropIfExists('category_product');
        Schema::dropIfExists('order_product');
        Schema::dropIfExists('order_service');
        Schema::dropIfExists('companies');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('roles_permissions');
        Schema::dropIfExists('roles_users');
        Schema::dropIfExists('roles_companies');
        Schema::dropIfExists('roles_deliveries');
        Schema::dropIfExists('roles_users');

    }
};
