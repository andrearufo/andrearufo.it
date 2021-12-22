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
        'youtube' => 'https://www.youtube.com/c/andrearufo',
        'substack' => 'https://andrearufo.substack.com/'
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
    'formatdate' => function ($page, $date = null) {
        if(!$date) return '';
        // $datetime = strtotime($date);
        // return $datetime;

        return strftime('%d %b %y', $date);
    },
    'readingtime' => function($content) {

        // assumed 265 words per minute
        $words_per_minute = 265;

        // // initialize the content
        // $content = [];

        // // the article title
        // $content[] = get_the_title();

        // // the article content
        // $content[] = get_the_content();

        // // all the contents
        // $content = implode(' ', $content);

        // count the words inside the content
        $words = str_word_count($content);

        // count the seconds for the content
        $time = $words / $words_per_minute * 60;

        // add the time for 'read' the featured image
        $time = $time + 12;

        // formatting the time
        $ii = intdiv($time, 60);
        // $ss = $time % 60;
        // $duration = $ii.':'.$ss;
        //
        // // a most readable format
        // $timetoread = human_readable_duration($duration);
        //
        // // Ex. '2 minutes, 52 seconds'
        // return $timetoread;

        $ss = ($time%60 > 30) ? 1 : 0;
        $ii = $ii  + $ss;
        return ($ii > 1) ? $ii.' minuti' : $ii.' minuto';
    }
];
