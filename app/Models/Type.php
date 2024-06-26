<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperType
 */
class Type extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function homes(): HasMany
    {
        return $this->hasMany(Home::class);
    }
}
