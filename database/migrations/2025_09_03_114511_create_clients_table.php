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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');              // اسم العميل
            $table->string('email')->unique();   // البريد الإلكتروني (فريد)
            $table->string('phone')->nullable(); // رقم الجوال (اختياري)
            $table->text('address')->nullable(); // العنوان (اختياري)
            $table->timestamps();                // created_at + updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};

