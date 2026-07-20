<?php

/**
 * Class Slider
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Slider
 *
 * @property int $id
 * @property string|null $title
 * @property string $image
 * @property string|null $url
 * @property int $sort
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class Slider extends Model
{
    use SoftDeletes;

    protected $table = 'sliders';

    public static $snakeAttributes = false;

    protected $casts = [
        'sort' => 'int',
        'status' => 'int',
    ];

    protected $fillable = [
        'title',
        'image',
        'url',
        'sort',
        'status',
    ];
}
