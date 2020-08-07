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

	protected $appends = ['full_name'];

    public function user()
    {
        return $this->belongsTo(User::class);
	}

	public function getFullNameAttribute()
	{
		return "{$this->first_name} {$this->last_name}";
	}

	public function setFirstNameAttribute($value)
	{
		$this->attributes['first_name'] = ucfirst(strtolower($value));
	}

	public function setLastNameAttribute($value)
	{
		$this->attributes['last_name'] = ucfirst(strtolower($value));
	}
}
