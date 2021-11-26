<?php
setlocale(LC_TIME, 'it_IT');

return [
    'production' => false,
    'baseUrl' => 'http://localhost:3000',
    'title' => 'Andrea Rufo, freelance full stack web developer personal portfolio',
    'description' => 'Sito web e portofolio di Andrea Rufo, full stack web developer. Programmazione di siti web e applicazioni. Specializzato in Larave, Vue, PWA, WordPress e webdesign.',
    'socials' => [
        'twitter' => 'https://twitter.com/@andrearufo',
        'linkedin' => 'https://www.linkedin.com/in/andrearufo/',
        'instagram' => 'https://www.instagram.com/andrearufo/',
        'github' => 'https://github.com/andrearufo',
        'youtube' => 'https://www.youtube.com/c/andrearufo'
    ],
    'menu' => require_once('config_menu.php'),
    'curriculum' => require_once('config_curriculum.php'),
    'contatti' => require_once('config_contatti.php'),
    'collections' => [
        'articoli' => [
            'path' => 'articoli/{created_at|Y/m/d}/{filename}',
            'sort' => '-created_at',
            'author' => 'Andrea Rufo',
        ],
        'portfolio' => [
            'path' => 'articoli/{filename}',
            'sort' => ['minore', '-anno'],
            'author' => 'Andrea Rufo',
            // 'filter' => function ($item) {
            //     return !$item->minore;
            // }
        ],
    ],
];
