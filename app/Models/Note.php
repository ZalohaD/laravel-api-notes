<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'title',
        'body'
    ];

    protected $casts = [
        'deleted_at' => 'datetime'
    ];

    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
