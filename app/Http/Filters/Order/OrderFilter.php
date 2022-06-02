<?php

namespace App\Http\Filters\Order;

use App\Http\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class OrderFilter extends Filter
{
    public const USER_ID = 'user_id';
    public const STATUS_ID = 'status_id';

    /**
     * @return array[]
     */
    protected function getCallbacks(): array
    {
        return [
            self::USER_ID => [$this, 'userId'],
            self::STATUS_ID => [$this, 'statusId'],
        ];
    }

    /**
     * @param Builder $builder
     * @param $value
     * @return void
     */
    public function userId(Builder $builder, $value): void
    {
        $builder->where('user_id', $value);
    }

    /**
     * @param Builder $builder
     * @param $value
     * @return void
     */
    public function statusId(Builder $builder, $value): void
    {
        $builder->where('status_id', $value);
    }
}
