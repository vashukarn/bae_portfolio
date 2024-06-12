<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class AdminScope implements Scope
{
    private string $column;

    public function __construct(string $column)
    {
        $this->column = $column;
    }

    public function apply(Builder $builder, Model $model)
    {
        if (auth()->check() && !auth()->user()->hasAnyRole(['Admin', 'Super Admin'])) {
            $builder->where($this->column, auth()->user()->id);
        }
    }
}
