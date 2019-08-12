<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Page
 *
 * @property int $id
 * @property string $template
 * @property int $image_id
 * @property string $name
 * @property string $slogan
 * @property string $title
 * @property string $description
 * @property string $text
 * @property string $alias
 * @property string $publish
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @mixin \Eloquent
 * @property-read \App\Image $image
 * @property string $is_published
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereIsPublished($value)
 * @property int|null $slider_id
 * @property int|null $gallery_id
 * @property-read \App\Gallery|null $gallery
 * @property-read string $url
 * @property-read \App\Slider|null $slider
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereAlias($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereGalleryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereSliderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereTemplate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereUpdatedAt($value)
 */
class Page extends Model
{
    use AutoAliasTrait;

    private $templates = [
        'page.page' => 'Информационная',
        'page.index' => 'Главная',
        'page.contacts' => 'Контакты'
    ];

    /**
     * @var array
     */
    protected $fillable = ['slider_id', 'gallery_id', 'template', 'name', 'title', 'description', 'text', 'alias', 'is_published'];

    /**
     * @return MorphOne
     */
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * @return BelongsTo
     */
    public function slider(): BelongsTo
    {
        return $this->belongsTo(Slider::class);
    }

    /**
     * @return BelongsTo
     */
    public function gallery(): BelongsTo
    {
        return $this->belongsTo(Gallery::class);
    }

    /**
     * @return string
     */
    public function getUrlAttribute(): string
    {
        return route('page.show', str_replace('index', '', $this->alias));
    }

    /**
     * @return array
     */
    public function getTemplates(): array
    {
        return $this->templates;
    }
}
