<?php

namespace App\Http\Filters\Order;

use App\Http\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class OrderFilter extends AbstractFilter
{
    public const USER_ID = 'user_id';
    public const STATUS_ID = 'status_id';

    protected function getCallbacks(): array
    {
        return [
            self::USER_ID => [$this, 'userId'],
            self::STATUS_ID => [$this, 'statusId'],
        ];
    }

    public function userId(Builder $builder, $value)
    {
        $builder->where('user_id', $value);
    }

    public function statusId(Builder $builder, $value)
    {
        $builder->where('status_id', $value);
    }
}
