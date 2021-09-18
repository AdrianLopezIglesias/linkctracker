<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class LinkStatistic
 * @package App\Models
 * @version September 18, 2021, 7:24 pm UTC
 *
 * @property integer $link_id
 * @property string $user_ip
 * @property integer $user_id
 */
class LinkStatistic extends Model
{

    use HasFactory;

    public $table = 'link_statistics';
    



    public $fillable = [
        'link_id',
        'user_ip',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'link_id' => 'integer',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
