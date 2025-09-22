<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');                // عنوان الكتاب
            $table->text('description');            // وصف الكتاب
            $table->longText('content')->nullable(); // محتوى داخلي (اختياري)
            $table->string('image')->nullable();    // صورة الغلاف
            $table->string('cover_url')->nullable(); // ملف PDF أو رابط
            $table->boolean('is_pending')->default(false); // حالة قيد الطبع
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('books');
    }
};
