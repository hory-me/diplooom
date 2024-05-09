<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Advertisement extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'city',
        'experience',
        'instrument',
        'concert_experience',
        'genres',
        'age',
        'own_material',
        'commercial_project',
        'requirements',
        'description',
        'email',
        'phone',
        'social_media',
        'user_id'
    ];

    protected $casts = [
        'genres' => 'array', // Метод cast позволяет указать Laravel, что 'genres' это массив
    ];

    // Определение отношения с пользователем
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
