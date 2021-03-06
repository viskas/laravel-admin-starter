<?php

namespace App\Models;

use App\Http\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * Class Article
 * @package App\Models
 */
class Article extends Model
{
    use Sortable, HasSlug, Filterable;

    protected $table = 'articles';

    protected $fillable = [
        'title',
        'slug',
        'image',
        'text',
        'status',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'published_at'
    ];

    public $sortable = [
        'title',
        'slug',
        'status',
        'published_at',
        'created_at',
        'updated_at'
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
}
