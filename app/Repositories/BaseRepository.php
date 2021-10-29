<?php

namespace App\Repositories;

abstract class BaseRepository
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * EloquentRepository constructor.
     */
    public function __construct()
    {
        $this->setModel();
    }

    /**
     * get model
     *
     * @return string
     */
    abstract public function getModel();

    /**
     * Set model
     */
    public function setModel()
    {
        $this->model = app()->make($this->getModel());
    }

    /**
     * Get All
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * Get data by $selectFields
     *
     * @param string $selectFields
     * @param array $conditions
     * @return mixed
     */
    public function get($selectFields = '*', $conditions = [])
    {
        $query = $this->model->select($selectFields);

        if (! empty($conditions)) {
            foreach ($conditions as $condition) {
                $query->where($condition['key'], $condition['operator'], $condition['param']);
            }
        }

        return $query->get();
    }

    /**
     * Truncate
     */
    public function truncate()
    {
        return $this->model::truncate();
    }

    /**
     * Get one
     *
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $result = $this->model->find($id);

        return $result;
    }

    /**
     * Create
     *
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * Insert
     *
     * @param array @attributes
     * @return mixed
     */

    public function insert(array $attributes)
    {
        return $this->model->insert($attributes);
    }

    /**
     * Update
     *
     * @param $id
     * @param array $attributes
     * @return bool|mixed
     */
    public function update($id, array $attributes)
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);

            return $result;
        }

        return false;
    }

    /**
     * Delete
     *
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();

            return $result;
        }

        return false;
    }

    protected function handleSearchParams($searchKeys, $searchParams)
    {
        foreach ($searchKeys as $searchKey) {
            if (! array_key_exists($searchKey, $searchParams)) {
                $searchParams[$searchKey] = '';
            }
        }

        return $searchParams;
    }
}
