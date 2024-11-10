<?php

return [
    'paths' => ['*'],  // Define the paths that should allow CORS, e.g., your API routes
    'allowed_methods' => ['*'],  // Allow all HTTP methods or specify (e.g., ['GET', 'POST'])
    'allowed_origins' => ['*'],  // Replace with your Flutter app's origin
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],  // Allow all headers or specify (e.g., ['Content-Type', 'Authorization'])
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false,
    

];
