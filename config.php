<?php

use Carbon\Carbon;
use Illuminate\Support\Str;
setlocale(LC_TIME, 'it_IT');

return [
    'production' => false,
    'baseUrl' => 'http://localhost:3000',
    'baseTitle' => 'Andrea Rufo, freelance full stack web developer personal portfolio',
    'description' => '',
    'socials' => [
        'twitter' => 'https://twitter.com/@andrearufo',
        'linkedin' => 'https://www.linkedin.com/in/andrearufo/',
        'instagram' => 'https://www.instagram.com/andrearufo/',
        'github' => 'https://github.com/andrearufo',
        'youtube' => 'https://www.youtube.com/c/andrearufo',
        'medium' => 'https://medium.com/@andrearufo',
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
        'liste' => [
            'path' => 'liste/{filename}',
            'sort' => '-created_at',
            'author' => 'Andrea Rufo',
        ],
        'portfolio' => [
            'path' => 'portfolio/{filename}',
            'sort' => ['minore', '-anno'],
            'author' => 'Andrea Rufo',
        ],
    ],
    'selected' => function ($page, $section) {
        if( $section != '/' && Str::contains($page->getPath(), $section) )
            echo 'current-menu-item';
        elseif($section == '/' && $page->getPath() == '' )
            echo 'current-menu-item';
        else
            echo 'not-current-menu-item';
    },
    'formatdate' => function ($page, $date = null) {
        if(!$date) return '';
        $formatter = Carbon::createFromTimestamp($date);
        echo $formatter->locale('it')->isoFormat('DD MMM YY');
    },
    'readingtime' => function($content) {

        // assumed 265 words per minute
        $words_per_minute = 265;

        // count the words inside the content
        $words = str_word_count($content);

        // count the seconds for the content
        $time = $words / $words_per_minute * 60;

        // add the time for 'read' the featured image
        $time = round($time) + 12;

        // formatting the time
        $ii = intdiv($time, 60);

        $ss = ($time%60 > 30) ? 1 : 0;
        $ii = $ii  + $ss;
        return ($ii > 1) ? $ii.' minuti' : $ii.' minuto';
    }
];
