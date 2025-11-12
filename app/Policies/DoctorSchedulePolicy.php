<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\DoctorSchedule;
use Illuminate\Auth\Access\HandlesAuthorization;

class DoctorSchedulePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:DoctorSchedule');
    }

    public function view(AuthUser $authUser, DoctorSchedule $doctorSchedule): bool
    {
        return $authUser->can('View:DoctorSchedule');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:DoctorSchedule');
    }

    public function update(AuthUser $authUser, DoctorSchedule $doctorSchedule): bool
    {
        return $authUser->can('Update:DoctorSchedule');
    }

    public function delete(AuthUser $authUser, DoctorSchedule $doctorSchedule): bool
    {
        return $authUser->can('Delete:DoctorSchedule');
    }

    public function restore(AuthUser $authUser, DoctorSchedule $doctorSchedule): bool
    {
        return $authUser->can('Restore:DoctorSchedule');
    }

    public function forceDelete(AuthUser $authUser, DoctorSchedule $doctorSchedule): bool
    {
        return $authUser->can('ForceDelete:DoctorSchedule');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:DoctorSchedule');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:DoctorSchedule');
    }

    public function replicate(AuthUser $authUser, DoctorSchedule $doctorSchedule): bool
    {
        return $authUser->can('Replicate:DoctorSchedule');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:DoctorSchedule');
    }

}