<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable=[
      'title',
        'status',
     'description',
     'dedline',
    ];


   
    public function categories() {
      return $this->belongsToMany(Category::class, 'task_categories');
  }
}
