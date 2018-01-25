<?php 

return [

    /**
     * --------------------------------------------------------------------------
     * Users Language Lines
     *--------------------------------------------------------------------------
     *
     * The following language lines contain the default translations used by
     * the application users system. Some of these rules have multiple versions such
     * as the size rules. Feel free to tweak each of these messages.
     *
     */
    
    // Flash errors 
    'flash-error-block-same-user' => 'Warning! You cannot block yourself in the application..',

    // Flash success messages 
    'flash-success-account-locked' => 'Has blocked a user in the system.', 

    // Log messages
    'activities-lock' => ':name is blocked in the application.',

    // Email translations 
    'email' => [
        'subjects' => [ // Email title Translations
            'blocked-user' => 'Your account has been blocked'
        ],

        'buttons' => [ // The button names in the emails
            'contact' => 'Contact' 
        ],

        'messages' => [ // The email content bodies
            'blocked-user' => "This email has been send to inform that your account on :application has been blocked.
                If you think this is some mistake you can use the contact button to mail the person that blocked your account.",
        ],

        // Misc. Translations
        'end-greeting' => 'Regards,'
    ],
];