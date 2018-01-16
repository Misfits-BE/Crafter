<?php 

namespace App\Traits; 

/**
 * ActivityTrait 
 * 
 * Trait voor het registreren van gebruikers activiteit in de back-end van de website. 
 * 
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Tim Joosten
 */
trait ActivityTrait 
{
    /**
     * Schrijf een activiteit log naar de databank. 
     * 
     * @param  mixed  $model      De entiteit van de model waarop de handeling is gebeurd.
     * @param  string $logger     De naam van de log waar het bericht moet opgeslagen worden. 
     * @param  string $message    Het bericht dat gelogd mpet worden. 
     * @return void
     */
    public function writeActivity($model, string $logger = null, string $message): void 
    {
        activity($logger)
            ->performedOn($model)
            ->causedBy(auth()->user())
            ->log($message);
    } 
}