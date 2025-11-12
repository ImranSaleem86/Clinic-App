<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\DoctorSpecialty;
use Illuminate\Auth\Access\HandlesAuthorization;

class DoctorSpecialtyPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:DoctorSpecialty');
    }

    public function view(AuthUser $authUser, DoctorSpecialty $doctorSpecialty): bool
    {
        return $authUser->can('View:DoctorSpecialty');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:DoctorSpecialty');
    }

    public function update(AuthUser $authUser, DoctorSpecialty $doctorSpecialty): bool
    {
        return $authUser->can('Update:DoctorSpecialty');
    }

    public function delete(AuthUser $authUser, DoctorSpecialty $doctorSpecialty): bool
    {
        return $authUser->can('Delete:DoctorSpecialty');
    }

    public function restore(AuthUser $authUser, DoctorSpecialty $doctorSpecialty): bool
    {
        return $authUser->can('Restore:DoctorSpecialty');
    }

    public function forceDelete(AuthUser $authUser, DoctorSpecialty $doctorSpecialty): bool
    {
        return $authUser->can('ForceDelete:DoctorSpecialty');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:DoctorSpecialty');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:DoctorSpecialty');
    }

    public function replicate(AuthUser $authUser, DoctorSpecialty $doctorSpecialty): bool
    {
        return $authUser->can('Replicate:DoctorSpecialty');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:DoctorSpecialty');
    }

}