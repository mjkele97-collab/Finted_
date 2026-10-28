<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use Searchable;

    protected $fillable = [
        'title',
        'body',
        'price',
        'category_id',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function setAccepted($value)
    {
        $this->is_accepted = $value;
        $this->save();

        return true;
    }

    public static function toBeRevisionedCount()
    {
        $revisionedCount = Article::where('is_accepted', null)->count();

        return $revisionedCount;
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'category' => $this->category,
        ];
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function hasRedFlags(): bool
    {
        return $this->images->contains(fn ($image) => $image->hasRedFlags());
    }
}
