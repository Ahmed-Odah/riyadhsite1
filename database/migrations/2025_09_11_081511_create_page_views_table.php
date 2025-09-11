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
        Schema::create('page_views', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable()->index(); // 🔹 المستخدم لو مسجل دخول
            $table->string('ip_address', 45)->nullable();               // 🔹 IP الزائر (IPv4 / IPv6)
            $table->text('user_agent')->nullable();                     // 🔹 الجهاز/المتصفح (نخليها text لأنه طويل أحياناً)
            $table->string('url')->nullable();                          // 🔹 الرابط الكامل للصفحة
            $table->string('page')->nullable();                         // 🔹 اسم الصفحة أو المسار
            $table->timestamp('visited_at')->useCurrent();              // 🔹 وقت الزيارة
            $table->timestamps();

            // 🔹 لو حابب تربط user_id بالـ users (اختياري)
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_views');
    }
};
