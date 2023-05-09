<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'faculty_id',
        'department_id',
        'programme_id',
        'name',
        'code',
        'credit_unit',
        'level_id',
        'semester_id'
    ];

    public function semester(): Attribute
    {
        return Attribute::make(get: fn($value, $attributes) => Semester::find($attributes['semester_id'])?->name);
    }

    public function level(): Attribute
    {
        return Attribute::make(get: fn($value, $attributes) => Level::find($attributes['level_id'])?->name);
    }
}
