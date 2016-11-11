<?php
return [
    'default' => env('LANGUAGE'),

    'languages' =>
        [
            'en' => [
                'code' => 'en',
                'title' => 'English',
                'flag' => 'en.jpg',
                'days' => [
                    '1' => 'Sunday', '2' => 'Monday', '3' => 'Tuesday', '4' => 'Wednesday', '5' => 'Thursday', '6' => 'Friday', '7' => 'Saturday'
                ]
            ],
            'id' => [
                'code' => 'id',
                'title' => 'Bahasa Indonesia',
                'flag' => 'id.jpg',
                'days' => [
                    '1' => 'Minggu', '2' => 'Senin', '3' => 'Selasa', '4' => 'Rabu', '5' => 'Kamis', '6' => 'Jumat', '7' => 'Sabtu'
                ]
            ]
        ]
];