<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
  use HasFactory;

  protected $table = 'employees';

  protected $fillable = [
    'firstname',
    'lastname',
    'factory_id',
    'email',
    'phone',
  ];

  protected $appends = ['full_name'];

  protected function fullName(): Attribute
  {
    return Attribute::make(
      get: fn() => ucfirst($this->lastname) . ', ' . ucfirst($this->firstname),
    );
  }

  public function factory(): BelongsTo
  {
    return $this->belongsTo(Factory::class, 'factory_id', 'id');
  }
}
