<?php

namespace App;
use App\User;
use App\Task;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name', 'user_id'];

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
