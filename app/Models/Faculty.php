<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'acronym'
    ];

    public function studentCount(): Attribute
    {
        return Attribute::make(get: fn($value, $attributes) => Student::where('faculty_id', $attributes['id'])->count());
    }
}
