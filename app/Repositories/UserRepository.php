<?php 

namespace App\Repositories;

use App\User;
use Spatie\Permission\Models\Role;
use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;
use Illuminate\Pagination\Paginator;

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
    public function model(): string
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
        $user = factory(User::class)->create(); 
        $user->assignRole($role->name);

        if ($role->name == 'admin') {
            $commandBus->info('Here are your admin details to login!'); 
            $commandBus->warn($user->email);
            $commandBus->warn('Password is "secret"');
        }
    }

    /**
     * Splits de gebruikers uit de databank op in meerdere 'chunks'
     * 
     * @param  int    $perPage  Het aantal resultaten per pagina. 
     * @param  string $type     Het type van de paginatie (weergave instantie)
     * @return \Illuminate\Pagination\Paginator
     */
    public function paginateUsers(int $perPage, string $type): Paginator 
    {
        switch ($type) {
            case 'simple':  return $this->entity()->simplePaginate($perPage);
            case 'default': return $this->paginate($perPage);

            // Geen type opgegeven. 
            default: return $this->paginate($perPage);
        }
    }
}