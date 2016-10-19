<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

class WxTestReply extends Model
{
    public $timestamps = false;

    public static function getReplyByReply($reply)
    {
        return self::where('reply', 'like', "%$reply%")
            ->where('isopen', '=', '1')
            ->orderBy('id', 'desc')
            ->first();
    }

}