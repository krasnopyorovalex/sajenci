<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Str;

/**
 * App\Article
 *
 * @property int $id
 * @property string $name
 * @property string $title
 * @property string $description
 * @property string $text
 * @property string $preview
 * @property string $alias
 * @property string $is_published
 * @property \Illuminate\Support\Carbon $published_at
 * @property-read \App\Image $image
 * @mixin \Eloquent
 * @property-read string $url
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereAlias($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereIsPublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article wherePreview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereTitle($value)
 */
class Article extends Model
{
    use AutoAliasTrait;

    private const LIMIT_WORDS_IN_PREVIEW = 7;

    public $timestamps = false;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'published_at'
    ];

    /**
     * @var array
     */
    protected $fillable = ['name', 'title', 'description', 'text', 'preview', 'alias', 'is_published', 'published_at'];

    /**
     * @return Relations\MorphOne
     */
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * @return string
     */
    public function getUrlAttribute(): string
    {
        return route('article.show', $this->alias);
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return sprintf('%s', $this->title);
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return sprintf('%s', $this->description);
    }

    /**
     * @return string
     */
    public function getPreview(): string
    {
        $preview = strip_tags($this->preview);

        return sprintf('%s', Str::words($preview, self::LIMIT_WORDS_IN_PREVIEW));
    }
}
