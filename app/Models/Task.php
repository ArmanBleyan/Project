<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'manager', 'programmer', 'status', 'description',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
