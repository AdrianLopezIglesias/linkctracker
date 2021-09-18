<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Link
 * @package App\Models
 * @version September 18, 2021, 7:15 pm UTC
 *
 * @property \App\Models\LinkStatistic $linkStatistic
 * @property string $original
 * @property string $masked
 * @property string $valid
 * @property string $password
 * @property string $expiration_date
 */
class Link extends Model
{

    use HasFactory;

    public $table = 'links';
    



    public $fillable = [
        'original',
        'masked',
        'valid',
        'password',
        'expiration_date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'expiration_date' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function statistics()
    {
        return $this->hasMany(\App\Models\LinkStatistic::class);
    }
}
