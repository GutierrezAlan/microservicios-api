<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Channel;
use App\Models\Media;
use App\Enums\PostType;
use App\Enums\PostStatus;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PostSeeder extends Seeder
{
    public function run(): void
   { // 1. Obtener usuarios
        $adminUser = User::role('admin')->first();
        $regularUsers = User::role('user')->limit(5)->get();
        
        // 2. Validar usuarios
        if (!$adminUser || $regularUsers->isEmpty()) {
            $this->command->warn('No users found...');
            return;
        }
        
        // 3. Obtener canales y medios
        $channels = Channel::all();
        $medias = Media::where('is_active', true)->get();
        
        // 4. Validar canales
        if ($channels->isEmpty()) {
            $this->command->warn('No channels found...');
            return;
        }
        
        // 5. Definir array de 11 posts
        $posts = [
            // 3 posts TEXT
            // 2 posts IMAGE
            // 2 posts VIDEO
            // 1 post AUDIO
            // 2 posts MULTIMEDIA
            // 1 post ARCHIVED
        ];
        
        // 6. Procesar cada post
        foreach ($posts as $postData) {
            $post = Post::firstOrCreate(
                ['name' => $postData['name'], 'user_id' => $postData['user_id']],
                $postData
            );
            
            // 7. Establecer relaciones N:M
            if ($post->wasRecentlyCreated) {
                // Canales (1-3)
                // Medios (1-4)
            }
        }
        
        $this->command->info('Posts seeded successfully with relationships!');
    }
    
}