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
        Schema::table('blogs', function (Blueprint $table) {
            // 🆕 إضافة أعمدة الربط مع فيسبوك
            if (!Schema::hasColumn('blogs', 'fb_post_id')) {
                $table->string('fb_post_id')->nullable()->unique()->after('id');
            }

            if (!Schema::hasColumn('blogs', 'source')) {
                $table->string('source')->nullable()->after('fb_post_id');
            }

            if (!Schema::hasColumn('blogs', 'published_at')) {
                $table->timestamp('published_at')->nullable()->after('source');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            // ❌ حذف الأعمدة إذا تم التراجع عن المايغريشن
            if (Schema::hasColumn('blogs', 'fb_post_id')) {
                $table->dropColumn('fb_post_id');
            }
            if (Schema::hasColumn('blogs', 'source')) {
                $table->dropColumn('source');
            }
            if (Schema::hasColumn('blogs', 'published_at')) {
                $table->dropColumn('published_at');
            }
        });
    }
};
