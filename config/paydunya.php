<?php

return [
    'masterKey' => env('PAYDUNYA_MASTER_KEY'),
    'publicKey' => env('PAYDUNYA_PUBLIC_KEY'),
    'privateKey' => env('PAYDUNYA_PRIVATE_KEY'),
    'token' => env('PAYDUNYA_TOKEN'),
    'mode' => 'test', // Changez en 'live' pour le mode production
    'store' => [
        'name' => "Aide1fere",
        // Ajoutez d'autres informations de votre entreprise ici
    ],
];