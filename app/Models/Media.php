<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Enums\MediaType;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'description',
        'configuration',
        'semantic_context',
        'is_active',
    ];

    protected $casts = [
        'type' => MediaType::class,
        'configuration' => 'array',        // JSON se convierte a array automáticamente
        'is_active' => 'boolean',
    ];

    // ================================
    // RELACIONES
    // ================================

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'post_medias');
    }

    public function channels(): BelongsToMany
    {
        return $this->belongsToMany(Channel::class, 'channel_medias');
    }
}
    // ================================
//<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// **1:N (Uno a Muchos)**
// - Un usuario tiene muchos posts
// - Un post pertenece a un usuario

// **N:M (Muchos a Muchos)**
// - Un post puede estar en muchos canales
// - Un canal puede tener muchos posts
// - Se necesita una tabla pivot

### Ejemplos Prácticos de Uso

#### 1. Crear y Relacionar Datos

// ```php
// // Crear un usuario
// $user = User::create([
//     'name' => 'Juan Pérez',
//     'email' => 'juan@universidad.edu',
//     'password' => bcrypt('secreto123'),
// ]);

// // Crear un post para ese usuario
// $post = $user->posts()->create([
//     'title' => 'Mi Primer Artículo',
//     'content' => 'Contenido del artículo...',
//     'type' => PostType::ARTICLE,
//     'status' => PostStatus::DRAFT,
// ]);

// // Crear canales
// $channelDepartamento = Channel::create([
//     'name' => 'Departamento de Sistemas',
//     'type' => ChannelType::DEPARTMENT,
//     'is_active' => true,
// ]);

// $channelInstituto = Channel::create([
//     'name' => 'Instituto de Investigación',
//     'type' => ChannelType::INSTITUTE,
//     'is_active' => true,
// ]);

// // Asociar el usuario a canales (solicitud pendiente)
// $user->requestChannelAccess($channelDepartamento);
// $user->requestChannelAccess($channelInstituto);

// // Aprobar usuario en departamento
// $channelDepartamento->approveUser($user);

// // Asociar el post a canales
// $post->channels()->attach([$channelDepartamento->id, $channelInstituto->id]);