<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserTransaction extends Model
{
    use HasFactory;
    protected $table = 'user_transactions';
    public function post(): HasMany
    {
        return $this->HasMany(User::class , 'id', 'user_id');
    }
    protected $fillable = [
     'user_id',
     'amount',
     'date'
    ];

}
