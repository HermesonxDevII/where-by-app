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
        'meeting_id'
    ];

    protected static function booted()
    {
        static::addGlobalScope('endDate', function (Builder $builder) {
            $builder->where('end_date', '>=', now());
        });
    }

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
