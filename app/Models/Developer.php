<?php

namespace App\Models;

use App\Enums\DeveloperRoleEnum;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    protected $fillable = ['name', 'email', 'password', 'role', 'created_by'];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'role' => DeveloperRoleEnum::class
        ];
    }
}
