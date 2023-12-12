<?php

return [
    'social' => [
        'instagram' => env('instagram' , 'https://www.instagram.com/catnear.me/'),
        'facebook'  => env('facebook' , 'https://www.facebook.com/profile.php?id=61550858460676'),
        'youtube'   => env('youtube' , 'https://www.youtube.com/channel/UC7G-DurGq-NE2IM2mRfQGCg')
    ],
    'forbidden_words' => [
        'password',
        'qwerty',
        'admin',
        'administrator',
        'manager',
        'uniqdeveloper',
        '123456',
        'catnearme',
        'aaa',
        '1234'
    ],
    'chatMessage' => [
        'client'  => "Welcome to CatNearMe!\n
        Dear Cat Lover, Welcome to CatNearMe!\n\n
        We're thrilled to have you join us on this exciting journey to find your new feline companion. Our platform is designed to make the adoption process seamless and joyful.
        Explore our listings, connect with breeders, and embark on the path to a lifelong friendship with your new furry friend. If you have any questions, we're here to help!\n\n
        Best regards,\n
        CatNearMe Team.",

        'breeder' => "Welcome to CatNearMe!\n
        Dear Breeder, Warmest greetings from CatNearMe!\n\n
        We're delighted to have you join our community of passionate feline enthusiasts. Your dedication to responsible breeding is truly valued.\n
        With CatNearMe, you'll find a supportive platform designed for both breeders and customers. Easily list your kittens and cats, connect with potential customers, and ensure they find their perfect forever homes.\n
        Should you have any questions or need assistance, our team is here to help. We are glad to have you with us!\n\n
        Best regards,\n
        CatNearMe Team.",

        'uploadMessageDoc' => "Dear Breeder,\n
        Welcome to CatNearMe! Kindly upload -\n
        1. Utility Bill\n
        2. Cat Association\n
        Visit My Profile to complete this quick step. Thank you!\n\n
        Best regards,\n
        CatNearMe Team.",
    ],
];
