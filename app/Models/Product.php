<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Enums\ProductStatus;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class Product
 *
 * @property int $id
 * @property string $name
 * @property string $en_name
 * @property int $product_category_id
 * @property int $price
 * @property float $discount
 * @property int $qty
 * @property int $status
 * @property string|null $description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 *
 * @property ProductCategory $productCategory
 * @property Collection|OrderItem[] $orderItems
 * @property Collection|ProductImage[] $productImages
 *
 * @package App\Models
 */
class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';
    public static $snakeAttributes = false;

    protected $casts = [
        'product_category_id' => 'int',
        'price' => 'int',
        'discount' => 'float',
        'qty' => 'int',
        'status' => ProductStatus::class
    ];

    protected $fillable = [
        'name',
        'en_name',
        'product_category_id',
        'price',
        'discount',
        'qty',
        'status',
        'description'
    ];

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function defaultImage()
    {
        return $this->hasOne(ProductImage::class)
            ->where('is_default', true);
    }


    #[Scope]
    public function applySort(Builder $query): void
    {

        $sort = request()->input('sort');


        switch ($sort) {

            case 'name_asc':
                $query->orderBy('name');
                break;


            case 'name_desc':
                $query->orderByDesc('name');
                break;


            case 'price_asc':
                $query->orderBy('price');
                break;


            case 'price_desc':
                $query->orderByDesc('price');
                break;


            default:
                $query->orderByDesc('created_at');
        }
    }


    #[Scope]
    public function applyFilter(Builder $query): Builder

    {
        $request = request();

        if ($request->filled('exists')) {
            $query->where('qty', '>', 0);

        }

        if ($request->filled('category_id')) {

            $categoryIds = array_keys($request->input('category_id'));
            $query->whereIn('product_category_id', $categoryIds);

        }

        return $query;
    }

    #[Scope]
    public function applySearch(Builder $query): void
    {

        $request = request();

        if ($request->filled('search')) {

            $keyword = $request->input('search');

            $query->whereAny([
                'name',
                'en_name',
                'description'
            ], 'LIKE', "%$keyword%");
        }

    }
}
