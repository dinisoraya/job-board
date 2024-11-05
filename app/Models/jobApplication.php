<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jobApplication extends Model
{
    use HasFactory;

    protected $fillable = ['expected_salary', 'user_id', 'job_id'];

    public function job(): BelongsTo
{
    return $this->belongsTo(Job::class);
}

public function user(): BelongsTo
{
    return $this->belongsTo(User::class);
}
}
