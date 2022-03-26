<?php

namespace App\Models;

use App\Traits\HasCan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Blog_subcategory extends Model
{
    use HasFactory;
   
    use HasCan;
    protected $connection = 'mysql_blog';
    
    protected $fillable = [
        'name','description','category_id'
    ];
    protected $with = [
        'blog_category'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    

    // protected $with = ['role'];
   

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

    
   


    public function blog_category()
    {
        return $this->belongsTo(Blog_category::class,'category_id');
    }
   
    
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            });
        });
    }


}
