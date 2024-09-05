<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class instructor extends Model
{
    use HasFactory;
    protected $table = 'instructors';
    public function post(): HasMany
    {
        return $this->HasMany(Course::class);
    }

    protected $fillable = [
      'name',
      'phone'
    ];

}
