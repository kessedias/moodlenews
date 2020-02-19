<?php

/**
 * Plugin de noticias do moodle - Arquivo de conteúdo 1
 * 
 * @package local_moodlenews
 * @author 2020, Kesse Dias <kesse@eadskill.com.br>
 */

//os arquivos config.php e adminlib.php, são estipulados pela convenção de desenvolvimento do MOODLE e devem ser inseridos 
 require_once(__DIR__ . '/../../../config.php');
 require_once($CFG->libdir . '/adminlib.php');
$CFG->cachejs = false; //não permite js cache

//necessário estar logado para ver esta página
require_login();

//Cabeçalho - Aqui estou setando o título da página e e o caminho onde o plugin se encontra 
$PAGE->set_title(get_string ('news_category', $plugin));
$PAGE->set_heading(get_string('news_category', $plugin));
$PAGE->set_pagelayout('admin');
//imprime a saída do cabeçalho
echo $OUTPUT->header();

//inicio
$out .= html_writer::start_tag('div');
echo 'Testando o plugin';
$out .= html_writer::end_tag('div');

//printando a saída do html
echo $out;

//printando a saída do rodapé;
echo $OUTPUT->footer();

