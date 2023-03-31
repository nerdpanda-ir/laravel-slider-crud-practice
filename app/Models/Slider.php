<?php

namespace App\Models;

use App\Models\Scopes\WhereActiveIsTrueScope;
use App\Traits\Model\DisableTimeStampTrait;
use App\Traits\Model\Scope\WhereActive;
use App\Traits\Model\Scope\WhereActiveIsFalse;
use App\Traits\Model\Scope\WhereActiveIsTrue;
use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use HasFactory , DisableTimeStampTrait , SoftDeletes ;
    use WhereActive , WhereActiveIsTrue , WhereActiveIsFalse ;
    public function getJalaliCreatedAtAttribute():Verta|null {
        if (!isset($this->attributes['created_at']))
            return null;
        return verta($this->getAttribute('created_at'));
    }
    public function getJalaliUpdatedAtAttribute():Verta|null {
        if (!isset($this->attributes['updated_at']))
            return null;
        return verta($this->getAttribute('updated_at'));
    }
    public function getJalaliDeletedAtAttribute():Verta|null {
        if (!isset($this->attributes['deleted_at']))
            return null;
        return verta($this->getAttribute('deleted_at'));
    }
}
