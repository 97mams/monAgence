<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'surface',
        'price',
        'rooms',
        'bedrooms',
        'floor',
        'city',
        'address',
        'postal_code',
        'sold'
    ];

    public function options(): BelongsToMany
    {
        return $this->belongsToMany(Option::class);
    }

    public function getSlug(): string
    {
        return Str::slug($this->title);
    }

    public function pictures(): HasMany
    {
        return $this->hasMany(Pictures::class);
    }

    public function attachFiles(array $files)
    {
        $prictures = [];
        foreach ($files as $file) {
            if ($file->getError()) {
                continue;
            }
            $filename = $file->store('properties/' . $this->id, 'public');
            $prictures[] = [
                'filename' => $filename
            ];
        }
        if (count($prictures) > 0) {
            $this->pictures()->createMany($prictures);
        }
    }

    public function getPicture(): ?Pictures
    {
        return $this->pictures[0] ?? null;
    }

    public function scopeAvailable(Builder $builder): Builder
    {
        return $builder->where('sold', false);
    }
}
