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
        'category_id',
        'URL',
        'file_path',
        'uploaded_at',
    ];

    public function materialType()
    {
        return $this->belongsTo(MaterialType::class, 'material_type_id');
    }

    public function access()
    {
        return $this->hasMany(MaterialAccess::class, 'materiaal_id');
    }

        public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
