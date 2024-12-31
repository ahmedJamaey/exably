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
        Schema::create('gateways', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->jsonb('info');
            $table->timestamps();
        });
        
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->dateTime('trial_start');
            $table->dateTime('trial_end');
            $table->string('status');
            
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('plan_id')->constrained('plans')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id')->unique();
            $table->string('discount_value');
            $table->string('status');
            $table->decimal('amount', 8, 2);
            $table->string('document');
            $table->jsonb('response');
            $table->decimal('vat', 8, 2);

            $table->foreignId('gateway_id')->constrained('gateways')->onDelete('cascade');
            $table->foreignId('subscription_id')->constrained('subscriptions')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('subscription_history', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->json('status_history'); //information
            $table->string('type');
            
            $table->foreignId('payment_id')->constrained('payments')->onDelete('cascade');
            $table->foreignId('subscription_id')->constrained('subscriptions')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('coupons', function (Blueprint $table){
            $table->id();
            $table->string('value');
            $table->dateTime('coupon_start');
            $table->dateTime('coupon_end');
            $table->string('type');

            $table->foreignId('subscription_id')->constrained('subscriptions')->onDelete('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
