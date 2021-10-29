<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\BaseRepository;

class ProductRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function getModel()
    {
        return Product::class;
    }

    /**
     * Get one
     *
     * @param string $selectFields
     * @return mixed
     */
    public function selectAll($selectField = '*')
    {
        $query = $this->model->select($selectField);

        return $query;
    }
}
