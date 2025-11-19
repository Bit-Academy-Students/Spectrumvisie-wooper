<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MaterialType extends Model
{
    use HasFactory;

    protected $table = 'material_type';

    protected $fillable = [
        'type',
        'icon',
    ];

    public function materials()
    {
        return $this->hasMany(Materiaal::class, 'material_type_id');
    }
}
