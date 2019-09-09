<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * App\Catalog
 *
 * @property int $id
 * @property int|null $parent_id
 * @property string $name
 * @property string $title
 * @property string|null $description
 * @property string|null $keywords
 * @property string $text
 * @property string $alias
 * @property string $is_published
 * @property int $pos
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Catalog[] $catalogs
 * @property-read \App\Image $image
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\CatalogProduct[] $products
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Catalog whereAlias($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Catalog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Catalog whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Catalog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Catalog whereIsPublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Catalog whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Catalog whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Catalog whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Catalog wherePos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Catalog whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Catalog whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Catalog whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Catalog extends Model
{
    use AutoAliasTrait, ImageTrait;

    /**
     * @var array
     */
    protected $fillable = ['parent_id', 'name', 'title', 'description', 'text', 'alias', 'pos'];

    /**
     * @return HasMany
     */
    public function catalogs(): HasMany
    {
        return $this->hasMany(__CLASS__, 'parent_id', 'id')->orderBy('pos');
    }

    /**
     * @return BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(__CLASS__, 'parent_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(CatalogProduct::class);
    }

    /**
     * @return MorphOne
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
        return route('page.show', $this->alias);
    }

    /**
     * @param string $alias
     * @return bool
     */
    public function isActive(string $alias): bool
    {
        return $alias === $this->alias || in_array($alias, $this->catalogs->pluck('alias')->toArray(), true);
    }
}
