<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Order
 *
 * @property int $id
 * @property int $user_id
 * @property int $final_price
 * @property int $final_discount
 * @property int $total_products
 * @property string $user_province
 * @property string $user_city
 * @property string $user_address
 * @property string $user_postal_code
 * @property string $user_mobile
 * @property string|null $description
 * @property string|null $tracking_code
 * @property int $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 *
 * @property User $user
 * @property Collection|OrderItem[] $orderItems
 *
 * @package App\Models
 */
class Order extends Model
{
    use SoftDeletes;

    protected $table = 'orders';
    public static $snakeAttributes = false;

    protected $casts = [
        'user_id' => 'int',
        'final_price' => 'int',
        'final_discount' => 'int',
        'total_products' => 'int',
        'status' => 'int'
    ];

    protected $fillable = [
        'user_id',
        'final_price',
        'final_discount',
        'total_products',
        'user_province',
        'user_city',
        'user_address',
        'user_postal_code',
        'user_mobile',
        'description',
        'tracking_code',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    #[Scope]
    public function scopeSearch(Builder $query, $search)
    {

        if (!$search) {
            return;
        }

        return $query->where(function ($q) use ($search) {

            $q->where('id', $search)
                ->orWhere('user_mobile', 'like', "%$search%");

        });

    }

    #[Scope]
    public function scopeSort(Builder $query, $sort)
    {

        switch ($sort) {

            case 'price_high':

                return $query->orderByDesc('final_price');


            case 'price_low':

                return $query->orderBy('final_price');


            case 'status':

                return $query->orderBy('status');


            case 'created_at_asc':

                return $query->oldest();


            default:

                return $query;

        }

    }
}
