<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\{ BelongsTo };
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\{ Model, Builder };
use Carbon\Carbon;

class Meeting extends Model
{
    protected $connection = 'mysql';
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
        'host_room_url',
        'viewer_room_url',
        'meeting_id',
        'primary_color',
        'secondary_color',
        'focus_color'
    ];

    public $timestamps = true;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::Class);
    }

    public function startDate(): Attribute
    {
        return Attribute::make(
            fn (string $value) => Carbon::make($value)->subHours(3)->format('d/m/Y H:i')
        );
    }

    public function endDate(): Attribute
    {
        return Attribute::make(
            fn (string $value) => Carbon::make($value)->subHours(3)->format('d/m/Y H:i')
        );
    }

    public function scopeOpenMeetings(Builder $builder): void
    {
        $builder->where('end_date', '>=', now());
    }
}
