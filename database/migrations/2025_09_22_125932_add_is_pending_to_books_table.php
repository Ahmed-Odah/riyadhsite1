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
        Schema::table('books', function (Blueprint $table) {
            // إضافة العمود الجديد is_pending
            $table->boolean('is_pending')
                ->default(false)
                ->after('cover_url'); // تضاف بعد حقل cover_url
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            // حذف العمود عند التراجع
            $table->dropColumn('is_pending');
        });
    }
};
