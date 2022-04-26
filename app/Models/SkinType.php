<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * App\Models\SkinType
 *
 * @method static \Illuminate\Database\Eloquent\Builder|SkinType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SkinType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SkinType query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SkinType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SkinType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SkinType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SkinType whereUpdatedAt($value)
 * @property string|null $solution
 * @property string|null $ingredients_text
 * @property string|null $products_guideline
 * @property-read mixed $image_asset_url
 * @property-read mixed $ingredients_image_asset_url
 * @property-read mixed $skintypes_table_image_asset_url
 * @method static \Illuminate\Database\Eloquent\Builder|SkinType whereIngredientsText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SkinType whereProductsGuideline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SkinType whereSolution($value)
 */
class SkinType extends Model
{
    use HasFactory;

    public const CACHE_KEY_COUNT = 'count-skin-types';
    public const CACHE_KEY_ALL = 'all-skin-types';

    protected $table = 'skin_types';

    protected $fillable = [
        'name',
        'solution',
        'ingredients_text',
        'products_guideline'
    ];

    // Relationships
    public function surveys()
    {
        return $this->hasMany(Survey::class, 'result', 'name');
    }

    public function getImageAssetUrlAttribute()
    {
        return url('images/skintypes/'.Str::lower($this->name).'.jpg');
    }

    public function getIngredientsImageAssetUrlAttribute()
    {
        return url('images/skintypes/ingredients/'.Str::lower($this->name).'.jpg');
    }

    public function getSkintypesTableImageAssetUrlAttribute()
    {
        return url('images/skintypes/table/'.Str::lower($this->name).'.jpg');
    }
}
