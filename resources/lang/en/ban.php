<?php

return [

    /**
     * --------------------------------------------------------------------------
     * Ban view Language Lines
     *--------------------------------------------------------------------------
     *
     * The following language lines contain the default translations used by
     * the application views form the ban system. Some of these rules have multiple versions such
     * as the size rules. Feel free to tweak each of these messages.
     *
     * @see resources/lang/{code}/users.php for the controller messsages
     *
     */

    'title'       => 'No Access',
    'description' => 'Sorry! Your account has been blockend on',

    'buttons' => [
        'go-back' => 'Go Back',
        'contact' => 'Contact',
    ],

    'flash' => [
        // Error
        'error-unban-same-user' => 'Sorry! You cannot unban yourself.',
        
        // Success
        'success-unban-user' => 'The user :name has been unbanned in the system.'
    ],

    'activities' => [
        'unban'  => 'Unbanned :name in the application.' 
    ],
    
    'email' => [
        'titles' => [
            'unban' => 'Your account is back active.'
        ],

        'messages' => [ // The email content bodies
            'active-user' => "This email has been send to inform that your account on :application has been unbanned.",
        ],
    ],

];