<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VolunteerContract extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $connection = 'paydal';

    public function document(): BelongsTo
    {
        return $this->belongsTo(VolunteerContractDocument::class, 'document_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
