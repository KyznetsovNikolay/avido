<?php

namespace App\Models\Region;

use App\Models\City\City;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $slug

 */
class Region extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['name', 'slug'];

    public function cities()
    {
        return $this->hasMany(City::class, 'region_id', 'id');
    }
}
