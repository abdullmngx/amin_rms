<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Student extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $fillable = [
      'matric_number',
      'first_name',
      'middle_name',
      'surname',
      'gender',
      'programme_type_id',
      'faculty_id',
      'department_id',
      'programme_id',
      'level_id',
      'email',
      'password'
    ];

    public function fullName(): Attribute
    {
        return Attribute::make(get: fn($value, $attributes) => ucwords("{$attributes['first_name']} {$attributes['middle_name']} {$attributes['surname']}") );
    }

    public function programmeType(): Attribute
    {
        return Attribute::make(get: fn ($value, $attributes) => ProgrammeType::find($attributes['programme_type_id'])?->name);
    }

    public function faculty(): Attribute
    {
        return Attribute::make(get: fn ($value, $attributes) => Faculty::find($attributes['faculty_id'])?->name);
    }

    public function department(): Attribute
    {
        return Attribute::make(get: fn ($value, $attributes) => Department::find($attributes['department_id'])?->name);
    }

    public function programme(): Attribute
    {
        return Attribute::make(get: fn ($value, $attributes) => Programme::find($attributes['programme_id'])?->name);
    }

    public function level(): Attribute
    {
        return Attribute::make(get: fn($value, $attributes) => Level::find($attributes['level_id'])?->name);
    }

    public function student_courses(): HasMany
    {
        return $this->hasMany(StudentCourse::class);
    }
}
