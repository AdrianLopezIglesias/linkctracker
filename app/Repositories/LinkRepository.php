<?php

namespace App\Repositories;

use App\Models\Link;
use App\Repositories\BaseRepository;

/**
 * Class LinkRepository
 * @package App\Repositories
 * @version September 18, 2021, 7:15 pm UTC
*/

class LinkRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'original',
        'masked',
        'valid',
        'password',
        'expiration_date'
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
        return Link::class;
    }
}
