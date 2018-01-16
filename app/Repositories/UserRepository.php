<?php 

namespace App\Repositories;

use App\User;
use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;

/**
 * Class UserRepository
 *
 * @package App\Repositories
 */
class UserRepository extends Repository
{
    /**
     * Set the eloquent model class for the repository.
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Creer een nieuwe gebruiker per toegangs rol. (seeder)
     * 
     * @param  Role  $role           De naam van de gebruikers rol. 
     * @param  mixed $commandBus     Mapping voor de command bus in de seeder
     * @return void
     */
    public function seedCreateUser(Role $role, $commandBus): void
    {
        $user = factory(User::class)->create(['password' => 'secret']); 
        $user->assignRole($role->name);

        if ($role->name == 'admin') {
            $commandBus->info('Here are your admin details to login!'); 
            $commandBus->warn($user->email);
            $commandBus->warn('Password is "secret"');
        }
    }
}