<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeIngredient extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'recipe_id',
        'ingredient_id',
    ];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

    public function ingredient()
    {
        return $this->hasOne(Ingredient::class);
    }
}
