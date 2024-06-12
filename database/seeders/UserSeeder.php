<?php

namespace Database\Seeders;

use App\Models\SocialLinks;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $super = User::create([
            'name' => 'Ankita Kesari',
            'email' => 'admin@ankitakesari.com.np',
            'phone' => '123456790',
            'profile_image' => asset('profile.jpeg'),
            'bio' => "Passionate legal aficionado and avid wordsmith, I delve into the intricate world of law to unravel its complexities through the art of writing. With a background in law and a penchant for storytelling, I craft compelling narratives that demystify legal concepts, making them accessible to all. From dissecting landmark cases to exploring emerging legal trends, my articles serve as a beacon of clarity in the often murky waters of the legal realm. Join me on a journey where law meets literature, and together, we'll navigate the labyrinth of jurisprudence with insight, curiosity, and a dash of creativity.",
            'password' => Hash::make('I_}zlpqijCLF'),
            'email_verified_at' => now(),
            'phone_verified_at' => now(),
        ]);
        $link = new SocialLinks([
            'social_id' => 1,
            'link' => 'https://www.ankitakesari.com.np/'
        ]);
        $super->social_links()->save($link);
        $super->syncRoles('Super Admin');
    }
}
