<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Materiaal extends Model
{
    use HasFactory;

    protected $table = 'materiaal';

    protected $fillable = [
        'title',
        'description',
        'material_type_id',
        'youtube_url',
        'file_path',
        'uploaded_at',
    ];

    public function type()
    {
        return $this->belongsTo(MaterialType::class, 'material_type_id');
    }
}
