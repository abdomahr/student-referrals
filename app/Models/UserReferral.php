<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class UserReferral extends Model
{
    use HasFactory;
    protected $table = 'user_referrals';
    public function post(): BelongsTo
    {
        return $this->BelongsTo(User::class, 'id', 'user_id');
    }
    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'course_id',
        'instructor_id',
    ];

}
