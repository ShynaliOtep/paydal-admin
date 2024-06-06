<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Protocol extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $connection = 'paydal';

    public function violation(): BelongsTo
    {
        return $this->belongsTo(Violation::class, 'violation_id', 'id');
    }

    public function violator(): BelongsTo
    {
        return $this->belongsTo(Violator::class, 'violator_id', 'id');
    }

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class, 'car_id', 'id');
    }
}
