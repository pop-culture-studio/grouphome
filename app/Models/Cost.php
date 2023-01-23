<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperCost
 */
class Cost extends Model
{
    use HasFactory;

    protected $touches = ['home'];

    public function home(): BelongsTo
    {
        return $this->belongsTo(Home::class);
    }
}
