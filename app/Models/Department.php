<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'faculty_id',
        'name',
        'acronym'
    ];

    public function faculty():Attribute
    {
        return Attribute::make(get: fn($value, $attributes) => Faculty::find($attributes['faculty_id'])?->name);
    }

    public function studentCount(): Attribute
    {
        return Attribute::make(get: fn($value, $attributes) => Student::where('department_id', $attributes['id'])->count());
    }
}
