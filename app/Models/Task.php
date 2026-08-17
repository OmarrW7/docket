<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'task_name',
        'priority',
        'description',
        'completed',
        'due_date',
    ];

    protected $casts = [
    'completed' => 'boolean',
    'due_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
