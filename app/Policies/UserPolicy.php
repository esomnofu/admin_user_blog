<?php

namespace App\Policies;

use App\Model\admin\admin;
//use App\admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the admin.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\admin  $admin
     * @return mixed
     */
    public function view(admin $admin)
    {
        //
    }

    /**
     * Determine whether the user can create admins.
     *
     * @param  \App\Model\user\User  $user
     * @return mixed
     */
    public function create(admin $admin)
    {
        return $this->getPermission($admin, 5);
    }

    /**
     * Determine whether the user can update the admin.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\admin  $admin
     * @return mixed
     */
    public function update(admin $admin)
    {
        return $this->getPermission($admin, 6);
    }

    /**
     * Determine whether the user can delete the admin.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\admin  $admin
     * @return mixed
     */
    public function delete(admin $admin)
    {
         return $this->getPermission($admin, 7);
    }


    public function super(admin $admin)
    {
         return $this->getPermission($admin, 10);
    }


    protected function getPermission($admin, $p_id)
    {

             foreach ($admin->roles as $role) {
            
            foreach ($role->permissions as $permission) {
                
                if ($permission->id == $p_id) {
                    
                    return true;
                }

            }
        }

        return false;
 

    }




}
