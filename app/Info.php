<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Info extends Model
{
    use AutoAliasTrait;

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
    protected $guarded = ['image'];

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
        return route('info.show', $this->alias);
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return sprintf('%s - новости виллы SANY от %s', $this->title, $this->published_at->format('d.m.Y'));
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return sprintf('Новости виллы SANY в Николаевке - %s от %s', $this->name, $this->published_at->format('d.m.Y'));
    }
}
