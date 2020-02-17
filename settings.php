<?php

/**
 * Plugin de noticias do moodle - Arquivo de configuração
 * 
 * @package local_moodlenews
 * @author 2020, Kesse Dias <kesse@eadskill.com.br>
 */

 //defina ou morra, aqui você insere o local da administração do site que o plugin será visualizado.
 defined('MOODLE_INTERNAL') || die;
$ADMIN->add(
    'root',
    new admin_category('moodlenews', get_string('news_category', 'local_moodlenews')),
);

$ADMIN->add(
    //definindo uma rota de link para acessar a página principal do plugin
    'moodlenews',
    new admin_externalpage(
        'moodlenews',
        get_string('news_main_page', 'local_moodlenews'),
        new moodle_url('/local/moodlenews/pages/index.php')
    )
);