<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\Role;
use App\Models\Status;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class OrderPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @param $ability
     * @return bool|void
     */
    public function before(User $user, $ability)
    {
        if ($user->role_id === Role::ADMIN_ID) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @return bool
     */
    public function viewAny(): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Order $order
     * @return bool
     */
    public function view(User $user, Order $order): bool
    {
        if ($user->role_id === Role::STOREKEEPER_ID and $order->status_id === Status::CREATED_STATUS_ID) {
            return true;
        }
        if ($user->role_id === Role::COURIER_ID and $order->status_id === Status::READY_FOR_DELIVERY_STATUS_ID) {
            return true;
        }

        return $user->id === $order->user_id || $user->role_id === Role::MANAGER_ID;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->role_id === Role::MANAGER_ID;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Order $order
     * @return bool
     */
    public function update(User $user, Order $order): bool
    {
        return $user->role_id === Role::STOREKEEPER_ID and $order->status_id === Status::CREATED_STATUS_ID;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Order $order
     * @return void
     */
    public function delete(User $user, Order $order): void
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Order $order
     * @return void
     */
    public function restore(User $user, Order $order): void
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Order $order
     * @return void
     */
    public function forceDelete(User $user, Order $order): void
    {
        //
    }

    /**
     * @param User $user
     * @param Order $order
     * @return bool
     */
    public function changeStatus(User $user, Order $order): bool
    {
        return $user->role_id === Role::COURIER_ID and $order->status_id >= Status::READY_FOR_DELIVERY_STATUS_ID;
    }

    /**
     * @param User $user
     * @param Order $order
     * @return bool
     */
    public function cancel(User $user, Order $order): bool
    {
        return $user->role_id === Role::MANAGER_ID and $order->status_id < Status::DELIVERED_STATUS_ID;
    }
}
