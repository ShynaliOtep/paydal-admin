<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ViolationMedia extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $connection = 'paydal';

    public function violation(): BelongsTo
    {
        return $this->belongsTo(Violation::class, 'violation_id', 'id');
    }

    public function file(): BelongsTo
    {
        return $this->belongsTo(File::class, 'file_id', 'id');
    }

}
