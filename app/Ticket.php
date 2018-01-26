<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Database model voor de issue ticketten. 
 * 
 * @author      Tim Joosten <tim@activisme.be> 
 * @copyright   2018 Tim Joosten
 * @package     \App
 */
class Ticket extends Model
{
    /**
     * Registratie van een andere databank connectie. 
     * ---- 
     * Dit is nodig omdat in deze databank alle helpdesk tickets samenkomen. 
     * Tickets komen binnen op meerdere applicaties. 
     * 
     * @var string
     */
    protected $connection = 'mysql_tickets';

    /**
     * MAss-assign velden voor de databank tabel
     * 
     * @var array
     */
    protected $fillable = ['creator_id'];
}
