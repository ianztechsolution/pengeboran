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
        Schema::create('service_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price', 15,0);
            $table->enum('status', ['AKTIF', 'TIDAK_AKTIF'])->default('TIDAK_AKTIF');
            $table->timestamps();
        });

        Schema::create('payment_channels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->enum('status', ['AKTIF', 'TIDAK_AKTIF'])->default('TIDAK_AKTIF');
            $table->timestamps();
        });

        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payment_channel_id')->constrained('payment_channels')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('customer_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('technician_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');

            $table->enum('status', ['REQUEST_APPROVAL', 'WAITING_PAYMENT', 'SCHEDULED', 'DONE', 'CANCELED'])->default('REQUEST_APPROVAL');
            $table->string('title');
            $table->date('date');
            $table->text('address')->nullable();
            $table->text('description')->nullable();

            $table->timestamps();
        });

        Schema::create('project_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('projects')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('service_type_id')->constrained('service_types')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('technician_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');

            $table->enum('status', ['REQUEST_APPROVAL', 'SCHEDULED', 'ON_PROGRESS', 'DONE', 'CANCELED'])->default('REQUEST_APPROVAL');
            $table->date('date');
            $table->text('description')->nullable();

            $table->timestamps();
        });

        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('projects')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('customer_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');

            $table->enum('status', ['WAIING_PAYMENT', 'PAID'])->default('WAIING_PAYMENT');
            $table->string('invoice_no');
            $table->decimal('total_price', 15,0);
            $table->decimal('discount', 15,0);
            $table->decimal('tax', 15,0);
            $table->decimal('grand_total', 15,0);
            $table->decimal('total_payment', 15,0);
            $table->date('paid_date')->nullable();
            $table->text('description')->nullable();

            $table->timestamps();
        });

        Schema::create('invoice_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoice_id')->constrained('invoices')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('project_service_id')->constrained('project_services')->onUpdate('cascade')->onDelete('cascade');
            $table->decimal('price', 15,0);
            $table->timestamps();
        });

        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('projects')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('invoice_id')->constrained('invoices')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('customer_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');

            $table->enum('status', ['WAIING_PAYMENT', 'PAID'])->default('WAIING_PAYMENT');
            $table->decimal('total_payment', 15,0);
            $table->date('paid_date')->nullable();
            $table->text('description')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_types');
        Schema::dropIfExists('payment_channels');
        Schema::dropIfExists('projects');
        Schema::dropIfExists('project_services');
        Schema::dropIfExists('invoices');
        Schema::dropIfExists('invoice_details');
        Schema::dropIfExists('payments');

    }
};
