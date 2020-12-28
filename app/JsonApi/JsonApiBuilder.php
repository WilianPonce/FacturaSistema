<?php

namespace App\JsonApi;
use Illuminate\Support\Str;

class JsonApiBuilder
{
    /** @return void */
    public function jsonPaginate()
    {
        return function () {
            return $this->paginate(
                $perPage = request('page.size'),
                $columns = ['*'],
                $pageName = 'page[number]',
                $page = request('page.number')
            )->appends(request()->except('page.number'));
        };
    }

    /** @return void */
    public function applySorts()
    {
        return function () {
            if(! \property_exists($this->model, 'allowed')){
                abort(500, 'Por favor agrega los campos permitidos a este modelo'.get_class($this->model));
            }
            if(is_null($sort = request("sort"))){
                return $this;
            }

            $sorts = Str::of($sort)->explode(',');

            foreach ($sorts as $sort) {
                $direction = 'asc';
                if(Str::of($sort)->startsWith('-')) {
                    $direction = 'desc';
                    $sort = Str::of($sort)->substr(1);
                }

                if(! collect($this->model->allowed)->contains($sort)){
                    abort(400, "El Parámetro {$sort} no fue encontrado.");
                }

                $this->orderBy($sort, $direction);
            }
            return $this;
        };
    }

    /** @return void */
    public function applyFilters()
    {
        return function () {
            if(! \property_exists($this->model, 'allowed')){
                abort(500, 'Por favor agrega los campos permitidos a este modelo'.get_class($this->model));
            }
            foreach (request('filter', []) as $filter => $value) {
                if($filter!='search'){
                    if(! collect($this->model->allowed)->contains($filter)){
                        abort(400, "El Parámetro {$filter} no fue encontrado.");
                    }
                    if($filter === 'year'){
                        $this->whereYear('created_at', "$value");
                    }else if($filter === 'month'){
                        $this->whereMonth('created_at', "$value");
                    }else if($filter === 'day'){
                        $this->whereDay('created_at', "$value");
                    }else{
                        $value_replace = str_replace(array(" ","_","-"),"%", $value);
                        $this->where($filter, 'LIKE', "%{$value_replace}%");
                    }
                }
            }
            return $this;
        };
    }

    /** @return void */
    public function applySearchs()
    {
        return function () {
            if(request('filter.search', [])){
                $search = request('filter.search');
                $filter = $this->model->allowed;
                foreach ($filter as $value) {
                    $value_replace = str_replace(array(" ","_","-"),"%", $search);
                    $this->orWhere($value, "LIKE", "%$value_replace%");
                }
            }
            return $this;
        };
    }
}
