<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MaterialAccess extends Model
{
    use HasFactory;
    
    protected $table = 'material_access';

    protected $fillable = [
        'materiaal_id',
        'role_id',
        'can_view',
        'can_download'
    ];

    public function materiaal()
    {
        return $this->belongsTo(Materiaal::class);
    }
}
