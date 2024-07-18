<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardDetails extends Model
{
        public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
    use HasFactory;
    
      protected $fillable = [
        'user_id',
        'cardNumber',
        'cardHolderName',
        'cvc',
        'expiryMonth',
        'expiryYear',
    ];
}
