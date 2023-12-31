<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'category_id', 'creator_id','link','description'];
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
