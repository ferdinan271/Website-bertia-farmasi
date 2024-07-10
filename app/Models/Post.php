<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    //properti yang boleh diisi yang lainnya tidak boleh
    //protected $fillable = ['title', 'excerpt', 'body'];

    //properti yang dijaga yang lain boleh diisi
    protected $guarded = ['id'];
    protected $with = ['author', 'category'];

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });
    }

    public function category()
    {
        return $this->belongsto(Category::class);
    }

    public function author()
    {
        return $this->belongsto(User::class, 'user_id');
    }

    // digunakan untuk menimpa route model binding sesuai yang kita inginkan
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function likers()
    {
        return $this->belongsToMany(User::class, 'likes');
    }

    public function isLikedByUser()
    {
        // Menggunakan relasi many-to-many untuk mengecek apakah pengguna sedang login telah menyukai post ini
        return $this->likes()->where('user_id', Auth::id())->exists();
    }
}
