<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\{ BelongsTo };
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Meeting extends Model
{
    protected $connection = '';
    protected $table = 'meetings';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'start_date',
        'end_date',
        'room_name',
        'room_url',
        'meeting_id'
    ];

    public $timestamps = true;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::Class);
    }

    public function startDate(): Attribute
    {
        return Attribute::make(
            fn (string $value) => Carbon::make($value)->format('d/m/Y H:i')
        );
    }

    public function endDate(): Attribute
    {
        return Attribute::make(
            fn (string $value) => Carbon::make($value)->format('d/m/Y H:i')
        );
    }
}
