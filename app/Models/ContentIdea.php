<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContentIdea extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    /**
     * Get the user that owns the ContentIdea
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function freelance(): BelongsTo
    {
        return $this->belongsTo(User::class, 'freelance_id', 'other_key');
    }
}
