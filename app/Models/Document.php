<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Document extends Model
{
    use HasFactory;

    protected $fillable = ['name','file','category_id','visibility'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
