<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';
    public function post(): BelongsTo
    { 
        return $this->BelongsTo(Instructor::class , 'id', 'instructor_id');
    }

    protected $fillable = [
        'name',
        'instructor_id',
        'level',
        'price',
    ];

}
