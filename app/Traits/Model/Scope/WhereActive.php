<?php namespace App\Traits\Model\Scope ;?>
<?php use \Illuminate\Database\Eloquent\Builder ;?>
<?php
trait WhereActive {
    public function scopeWhereActive(Builder $builder , bool $active):void {
        $table = $builder->getModel()->getTable();
        $column = $table.'.is_active';
        $builder->where($column,'=',$active);
    }
}
