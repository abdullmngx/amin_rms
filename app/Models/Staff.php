<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Staff extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'first_name',
        'middle_name',
        'surname',
        'phone_number',
        'email',
        'faculty_id',
        'department_id',
        'programme_id',
        'type',
        'email',
        'password'
    ];

    public function fullName(): Attribute
    {
        return Attribute::make(get: fn($value, $attributes) => ucwords("{$attributes['first_name']} {$attributes['middle_name']} {$attributes['surname']}"));
    }

    public function courses(): HasMany
    {
        return $this->hasMany(StaffCourse::class);
    }
}
