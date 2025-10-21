<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Deposit extends Model
{
    use SoftDeletes;

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

    protected $dates = ['deleted_at'];

    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

}
