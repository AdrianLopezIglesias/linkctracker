<?php

namespace App\Repositories;

use App\Models\LinkStatistic;
use App\Repositories\BaseRepository;

/**
 * Class LinkStatisticRepository
 * @package App\Repositories
 * @version September 18, 2021, 7:25 pm UTC
*/

class LinkStatisticRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'link_id',
        'user_ip',
        'user_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return LinkStatistic::class;
    }
}
