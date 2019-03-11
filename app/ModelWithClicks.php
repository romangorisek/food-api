<?php

namespace App;

use Illuminate\Support\Facades\DB;

class ModelWithClicks extends Model
{
    public static function allSortedByClicks()
    {
        return DB::table(static::$tableName)
            ->select(DB::raw('count(clicks.id) as click_count, '.static::$tableName.'.*'))
            ->leftJoin('clicks', function($join) {
                $join->on('clicks.value', '=', static::$tableName.'.id')
                    ->where('clicks.user_id', '=', auth()->user()->id)
                    ->where('clicks.model', '=', static::class);
            })
            ->groupBy(static::$tableName.'.id')
            ->orderBy('click_count', 'desc')
            ->orderBy(static::$tableName.'.title', 'asc')
            ->get();
    }
}
