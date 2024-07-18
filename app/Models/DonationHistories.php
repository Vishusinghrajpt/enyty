<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DonationHistories extends Model
{
    
    
    
     public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
    use HasFactory;
    
      protected $fillable = [
        'user_id',
        'donationId',
        'amount',
        'status',
        'receipt_url',
        'donationDate',
        'paymentMethod',
        'paymentDetails',
        'fullName',
        'emailAddress',
        'currency'
    ];
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}

