<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Peripheral extends Model
{
    use HasFactory;

    protected $fillable = ['type','serial','make','model'];

    public function computers(): BelongsToMany
    {
        return $this->belongsToMany(Computer::class);
    }
}

