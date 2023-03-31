<?php namespace App\Traits\Model\Scope ;?>
<?php use \Illuminate\Database\Eloquent\Builder ;?>
<?php
trait WhereActiveIsFalse {
    public function scopeWhereActiveIsFalse(Builder $builder):void {
        $builder->whereActive(false);
    }
}
