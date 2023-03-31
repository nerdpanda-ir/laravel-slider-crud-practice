<?php namespace App\Traits\Model\Scope ;?>
<?php use \Illuminate\Database\Eloquent\Builder ;?>
<?php
trait WhereActiveIsTrue {
    public function scopeWhereActiveIsTrue(Builder $builder):void {
        $builder->whereActive(true);
    }
}
