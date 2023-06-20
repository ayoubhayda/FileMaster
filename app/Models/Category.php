<?php

namespace App\Models;

<<<<<<< HEAD
use App\Models\Document;
use Illuminate\Database\Eloquent\Model;
=======
use App\Models\User;
use App\Models\Document;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
>>>>>>> 4ef379088396fbb282af9c1dec7ac545a4680811
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
<<<<<<< HEAD

    protected $fillable = ['name'];

    public function documents(){
        return $this->hasMany(Document::class);
    }
=======
    use HasSlug;

    protected $fillable = [
        'name',
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

>>>>>>> 4ef379088396fbb282af9c1dec7ac545a4680811
}
