<?php

namespace App\Services;

use App\Exceptions\GeneralException;
use App\Services\BaseService;
use App\Models\MovieListing;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class RoleService.
 */
class MovieService extends BaseService
{
    /**
     * RoleService constructor.
     *
     * @param  Role  $role
     */
    public function __construct(MovieListing $movie)
    {
        $this->model = $movie;
    }

    /**
     * @param  array  $data
     * @return Role
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): MovieListing
    {
        DB::beginTransaction();

        try {
            $role = $this->model::create(['name' => $data['name'], 'description' => $data['description'],'youtube_url'=> $data['youtube_url'],'slug'=> $data['slug'],'release_date'=> $data['release_date']]);
            //$role->syncPermissions($data['permissions'] ?? []);
        } catch (Exception $e) {
            //dd($e);
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating the role.'));
        }

       // event(new RoleCreated($role));

        DB::commit();

        return $role;
    }

    /**
     * @param  Role  $role
     * @param  array  $data
     * @return Role
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function update(MovieListing $role, array $data = []): MovieListing
    {
        DB::beginTransaction();

        try {
            $role->update(['name' => $data['name'], 'description' => $data['description'],'youtube_url'=> $data['youtube_url'],'slug'=> $data['slug'],'release_date'=> $data['release_date']]);
            //$role->syncPermissions($data['permissions'] ?? []);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating the role.'));
        }

       // event(new RoleUpdated($role));

        DB::commit();

        return $role;
    }

    /**
     * @param  MovieListing  $role
     * @return bool
     *
     * @throws GeneralException
     */
    public function delete(MovieListing $role): bool
    {

        //dd($role);
        // if ($role->users()->count()) {
        //     throw new GeneralException(__('You can not delete a role with associated users.'));
        // }

        if ($this->deleteById($role->id)) {
            //event(new RoleDeleted($role));

            return true;
        }

        throw new GeneralException(__('There was a problem deleting the role.'));
    }
}
