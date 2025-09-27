<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->text('content')->nullable(); // محتوى الكتاب اختياري
            $table->string('image')->nullable(); // رابط الصورة اختياري
            $table->string('cover_url')->nullable(); // رابط PDF اختياري
            $table->boolean('is_pending')->default(false); // ✨ قيد الطبع أو منشور

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('books');
    }
};
