<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // لو عندك مستخدم اسمه admin@gmail.com غيّر الباسوورد تبعه
        User::where('email', 'admin@gmail.com')->update([
            'password' => Hash::make('0583178900'),
        ]);

        // ممكن تخلي هذا مثال إنشاء مستخدم جديد إذا ما كان موجود
        // User::factory()->create([
        //     'name' => 'Admin User',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('12345678'),
        // ]);
    }
}
