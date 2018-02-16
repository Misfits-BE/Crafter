<?php 

namespace App\Repositories;

use Spatie\Permission\Models\Role;
use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;

/**
 * Class RoleRepository
 *
 * @package App\Repositories
 */
class RoleRepository extends Repository
{
    /**
     * Set the eloquent model class for the repository.
     *
     * @return string
     */
    public function model()
    {
        return Role::class;
    }

    /**
     * (seeder) Creer een nieuw role in het systeem. 
     * 
     * Dit is een functie voor de UsersTableSeeder die rust op de 
     * Eloquent ORM ->firstOrCreate() method. 
     * 
     * @param  array $role De naam voor de rol 
     * @return \Spatie\Permission\Models\Role
     */
    public function seedFirstOrCreate(array $role): Role 
    {
        return $this->model->firstOrCreate($role);
    } 
}