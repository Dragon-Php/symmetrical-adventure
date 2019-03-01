<?php

namespace App\Http\Traits;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ActiveScope implements Scope
{
	/**
     * All of the extensions to be added to the builder.
     *
     * @var array
     */
	// protected $extensions = ['WithStatus', 'WithoutAllStatus', 'OnlyInActive'];
	protected $extensions = ['WithAllStatus', 'OnlyInActive', 'WithStatus'];
    /**
     * All of the extensions to be added to the builder.
     *
     * @var array
     */

    public function apply(Builder $builder, Model $model)
    {
        $builder->where($model->getQualifiedIsActiveColumn(), '1');
    }

    /**
     * Extend the query builder with the needed functions.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @return void
     */
    public function extend(Builder $builder)
    {
        foreach ($this->extensions as $extension) {
            $this->{"add{$extension}"}($builder);
        }
       
    }

    protected function addWithAllStatus(Builder $builder)
    {
        $builder->macro('withAllStatus', function (Builder $builder, $withAllStatus = true) {
            return $builder->withoutGlobalScope($this);
        });
    }

    protected function addOnlyInActive(Builder $builder)
    {
        $builder->macro('onlyInActive', function (Builder $builder, $onlyInActive = true) {
        	if($onlyInActive){
        		$model = $builder->getModel();
        		$builder->withoutGlobalScope($this)->where(
	                $model->getQualifiedIsActiveColumn(), '0'
	            );
        	}
            return $builder->withoutGlobalScope($this);
        });
    }

    protected function addWithStatus(Builder $builder)
    {
        $builder->macro('withStatus', function (Builder $builder, $withStatus = '0') {
        	$model = $builder->getModel();
    		$builder->withoutGlobalScope($this)->where(
                $model->getQualifiedIsActiveColumn(), $withStatus
            );
            return $builder->withoutGlobalScope($this);
        });
    }

}