<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserEducationInformation extends Model
{
	use SoftDeletes;

    protected $fillable = [
        'education_level', 'study'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
