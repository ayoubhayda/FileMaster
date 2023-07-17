<?php

namespace App\Policies;

use App\Models\Document;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DocumentPolicy
{
        public function before(User $user)
    {
        if ($user->role === 0) {
            return true;
        }
        return Response::deny("CETTE ACTION N'EST PAS AUTORISEE.");
    }
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        return function ($query) use ($user) {
            $query->whereIn('category_id', $user->categories->pluck('id'))
        ->when($user->role === 1, function ($query) {
            $query->where('role', 1);
        });};
    }
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Document $document)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Document $document)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Document $document)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Document $document)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Document $document)
    {
        //
    }
}
