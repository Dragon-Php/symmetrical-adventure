<?php

namespace App\Http\Traits;


/**
* 
*/
trait Active
{
    
    /**
     * Boot the soft deleting trait for a model.
     *
     * @return void
     */
    public static function bootActive()
    {
        static::addGlobalScope(new ActiveScope);
    }

    /**
     * Get the name of the "deleted at" column.
     *
     * @return string
     */
    public function getIsActiveColumn()
    {
        return  'is_active';
    }

    /**
     * Get the fully qualified "deleted at" column.
     *
     * @return string
     */
    public function getQualifiedIsActiveColumn()
    {
        return $this->qualifyColumn($this->getIsActiveColumn());
    }
}