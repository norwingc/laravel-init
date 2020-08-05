<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserPersonalInformation extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'first_name', 'last_name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
