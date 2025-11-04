<?php

namespace App\Policies;

use App\Models\AccountNumber;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AccountNumberPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('viewAny account number');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, AccountNumber $account_number): bool
    {
        return $user->can('view account number');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create account number');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, AccountNumber $account_number): bool
    {
        return $user->can('update account number');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, AccountNumber $account_number): bool
    {
        return $user->can('delete account number');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, AccountNumber $account_number): bool
    {
        return $user->can('restore account number');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, AccountNumber $account_number): bool
    {
        return $user->can('forceDelete account number');
    }
}
