<?php

return [
    'table' => env('MEMBER_TABLE', 'users'),
    'model' => env('MEMBER_MODEL', 'App\User'),
    'primary_key' => env('MEMBER_PRIMARY_KEY', 'id'),
    'foreign_key' => env('MEMBER_FOREIGN_KEY', 'user_id')
];