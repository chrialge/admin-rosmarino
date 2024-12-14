<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Dish extends Model
{
    use HasFactory;


    protected $fillable = ['name', 'slug', 'image', 'price', 'typology', 'description'];


    /**
     * The roles that belong to the Dish
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function allergies(): BelongsToMany
    {
        return $this->belongsToMany(Allergy::class);
    }
}
