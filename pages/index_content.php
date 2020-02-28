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
//setando o nome do plugin
$plugin = 'local_moodlenews';

//necessário estar logado para ver esta página
require_login();

/**
 * Aqui recebe o parametro da página de listagem e o mesmo é obrigatório
 */

$id = required_param('id', PARAM_INT);

//Cabeçalho - Aqui estou setando o título da página e e o caminho onde o plugin se encontra 
$PAGE->set_title(get_string ('news_category', $plugin));
$PAGE->set_heading(get_string('news_main_page', $plugin));
$PAGE->set_pagelayout('admin');
//fazendo a chamada do css
$PAGE->requires->css('/local/moodlenews/styles.css');
//imprime a saída do cabeçalho
echo $OUTPUT->header();
//chamada do arquivo main.js
$PAGE->requires->js_call_amd('local_moodlenews/main', 'init');
//Array de notícias


//inicio
$out .= html_writer::start_tag('div');
$out .= html_writer::tag('h1', $SESSION->news[$id]->txt_title);
$out .= html_writer::tag('p', $SESSION->news[$id]->txta_content);
$out .= html_writer::start_tag('div', ['class' => 'image-wrapper']);
$out .= html_writer::tag('img', null, ['src' => $SESSION->news[$id]->sourceimg, 'alt' => 'img_news', 'width' => 600, 'height'=> 'auto', 'id' => 'change_img']);
$out .= html_writer::tag('p','Data: '. date('d/m/Y à\s H:i', $id));
$out .= html_writer::tag('p', 'Faça a sua avaliação!');
$out .= html_writer::start_tag('div', ['class' => 'btn-wrapper']);
$out .= html_writer::tag('button', null, ['class' => 'btn-noclick', 'id' => 'btn1']);
$out .= html_writer::tag('button', null, ['class' => 'btn-noclick', 'id' => 'btn2']);
$out .= html_writer::tag('button', null, ['class' => 'btn-noclick', 'id' => 'btn3']);
$out .= html_writer::tag('button', null, ['class' => 'btn-noclick', 'id' => 'btn4']);
$out .= html_writer::tag('button', null, ['class' => 'btn-noclick', 'id' => 'btn5']);
$out .= html_writer::end_tag('div');

//printando a saída do html
echo $out;

//printando a saída do rodapé;
echo $OUTPUT->footer();