<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class News extends Model
{
    use HasFactory,SoftDeletes;

    protected $table='news';

    protected $fillable=[
        'title',
        'slug',
        'content',
        'image',
        'category_id',
        'user_id',
        'is_active'
    ];

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
        //belongsto metodu news modeli ile category modelin baglanmasını yaptı. Laravel otomatik olarak yapıyor.
        //category_id ile category modelindeki id birleşti.
    }
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function images():HasMany
    {
        return $this->hasMany(NewsImages::class);
    }
}
