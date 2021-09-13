<?php

namespace App\Models\City;

use App\Models\Region\Region;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $region_id
 */
class City extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['name', 'slug', 'region_id'];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
