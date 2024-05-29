<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VolunteerContractDocument extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $connection = 'paydal';

    public function frontImage(): BelongsTo
    {
        return $this->belongsTo(File::class, 'front_image_id', 'id');
    }

    public function backImage(): BelongsTo
    {
        return $this->belongsTo(File::class, 'back_image_id', 'id');
    }

    public function frontWithAvatar(): BelongsTo
    {
        return $this->belongsTo(File::class, 'back_with_avatar_id', 'id');
    }

    public function backWithAvatar(): BelongsTo
    {
        return $this->belongsTo(File::class, 'back_with_avatar_id', 'id');
    }
}
