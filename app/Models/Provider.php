<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Provider extends Model
{
  use HasFactory;
  protected $connection = 'mysql';
  protected $table = 'providers';
  protected $primaryKey = 'id';

  protected $fillable = [
    'name',
    'base_url',
    'base_api_url',
    'account_id',
    'client_id',
    'client_secret',
    'secret_token',
    'active'
  ];

  protected $casts = [
    'active' => 'boolean'
  ];

  public $timestamps = true;

  public static function getActive(): ?self
  {
    return self::where('active', true)->first();
  }

  public function isWhereBy(): bool
  {
    return Str::lower($this->name) === 'where by';
  }

  public function isZoom(): bool
  {
    return Str::lower($this->name) === 'zoom';
  }
}
