<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'reference_no',
        'amount',
        'currency',
        'payment_method',
        'status',
        'remarks',
        'document_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
