<?php

namespace App\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    public function __construct(protected Model $model)
    {
    }

    protected function getFindQuery(array $params)
    {
        $keys = array_keys($params);
        $countKeys = count($keys);

        for ($i = 0; $i < $countKeys; $i++) {

            $key = $keys[$i];
            $value = $params[$key];

            if (! isset($query)) {
                $query = $this->model->where($key, $value);
            } else {
                $query->where($key, $value);
            }
        }

        return $query;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create(array $array): Model
    {
        return $this->model->create($array);
    }

    public function update(array $data, int $id)
    {
        return $this->model->where('id', $id)
            ->update($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function find(int $id): ?Model
    {
        return $this->model->find($id);
    }

    public function findBy(array $data): Collection
    {
        return $this->getFindQuery($data)->get();
    }

    public function findOneBy(array $data): ?Model
    {
        return $this->getFindQuery($data)->first();
    }
}
