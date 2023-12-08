<?php

namespace App\Models;

use Auth;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Product
 *
 * @mixin Builder
 * @property int $id
 * @property int $brand_id
 * @property int $product_category_id
 * @property string $name
 * @property string|null $description
 * @property string|null $content
 * @property float $price
 * @property int $qty
 * @property float|null $discount
 * @property float|null $weight
 * @property string|null $sku
 * @property int $featured
 * @property string|null $tag
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Brand|null $brand
 * @property-read Collection<int, OrderDetail> $orderDetails
 * @property-read int|null $order_details_count
 * @property-read ProductCategory|null $productCategory
 * @property-read Collection<int, ProductComment> $productComments
 * @property-read int|null $product_comments_count
 * @property-read Collection<int, ProductDetail> $productDetails
 * @property-read int|null $product_details_count
 * @property-read Collection<int, ProductImage> $productImages
 * @property-read int|null $product_images_count
 * @method static Builder|Product newModelQuery()
 * @method static Builder|Product newQuery()
 * @method static Builder|Product query()
 * @method static Builder|Product whereBrandId($value)
 * @method static Builder|Product whereContent($value)
 * @method static Builder|Product whereCreatedAt($value)
 * @method static Builder|Product whereDescription($value)
 * @method static Builder|Product whereDiscount($value)
 * @method static Builder|Product whereFeatured($value)
 * @method static Builder|Product whereId($value)
 * @method static Builder|Product whereName($value)
 * @method static Builder|Product wherePrice($value)
 * @method static Builder|Product whereProductCategoryId($value)
 * @method static Builder|Product whereQty($value)
 * @method static Builder|Product whereSku($value)
 * @method static Builder|Product whereTag($value)
 * @method static Builder|Product whereUpdatedAt($value)
 * @method static Builder|Product whereWeight($value)
 * @mixin Eloquent
 */
class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function productCategory(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id');
    }

    public function productImages(): HasMany
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function productDetails(): HasMany
    {
        return $this->hasMany(ProductDetail::class, 'product_id', 'id');
    }

    public function getPriceAttribute()
    {
        return !Auth::user() ? 'Liên hệ' : $this->attributes['price'];
    }
}
