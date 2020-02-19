<?php

/**
 * Plugin de noticias do moodle - Arquivo de descrição da noticia
 * 
 * @package local_moodlenews
 * @author 2020, Kesse Dias <kesse@eadskill.com.br>
 */

require_once(__DIR__ . '/../../../config.php');
$plugin = 'local_moodlenews';

//necessário estar logado para ver esta página
require_login();
//Cabeçalho - Aqui estou setando o título da página e e o caminho onde o plugin se encontra 
$PAGE->set_title(get_string ('news_category', $plugin));
$PAGE->set_heading(get_string('news_description', $plugin));
$PAGE->set_pagelayout('admin');


//fazendo a chamada do css
$PAGE->requires->css('/local/moodlenews/styles.css');
//imprime a saída do cabeçalho
echo $OUTPUT->header();

$out .= html_writer::start_tag('div');
echo 'teste';
$out .= html_writer::end_tag('div');
