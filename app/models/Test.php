<?php

/**
 * Created by PhpStorm.
 * User: GE62
 * Date: 2016/10/18
 * Time: 16:18
 */
class Test extends Illuminate\Database\Eloquent\Model
{
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'test';

    /**
     * 该模型是否被自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * 模型的日期字段保存格式。
     *
     * @var string
     */
    protected $dateFormat = 'U';

    public function getListById()
    {
        self::where('',1)->first();

    }


}