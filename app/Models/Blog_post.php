<?php

namespace App\Models;

use App\Traits\HasCan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog_post extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $connection = 'mysql_blog';

    use HasCan;
    protected $fillable = [
        'title',
        'subtitle',
        'creator',
        'content',
        'visits',
        'publication_date',
        'user_id',
        'subcategory_id',
        'category_id',
        'banner',
        'usevideo',
        'description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $casts = [
        'content' => 'array',
    ];

    protected $with = ['blog_subcategory'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'can',
    ];

    public function getCreatedAtAttribute($value)
    {
        return now()->parse($value)->timezone(config('app.timezone'))->format('d F Y, H:i:s');
    }

    public function getUpdatedAtAttribute($value)
    {
        return now()->parse($value)->timezone(config('app.timezone'))->diffForHumans();
    }

    public function blog_subcategory()
    {
        return $this->belongsTo(Blog_subcategory::class, 'subcategory_id');
    }
    public function blog_category()
    {
        return $this->belongsTo(Blog_category::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(Blog_User::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orwhere('subtitle', 'like', '%' . $search . '%')
                    ->orwhere('creator', 'like', '%' . $search . '%')
                    ->orwhere('created_at', 'like', '%' . $search . '%');
            });
        });
    }
}
