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

//Cabeçalho - Aqui estou setando o título da página e e o caminho onde o plugin se encontra 
$PAGE->set_title(get_string ('news_category', $plugin));
$PAGE->set_heading(get_string('news_main_page', $plugin));
$PAGE->set_pagelayout('admin');
//fazendo a chamada do css
$PAGE->requires->css('/local/moodlenews/styles.css');
//imprime a saída do cabeçalho
echo $OUTPUT->header();

$news = [];

$n1 = [
    'id'            => 1,
    'title'         =>'O melhor Moodle do mundo', 
    'description'   => 'É isso aí',
    'content'       =>'Estamos em 2077 e hoje completa o aniversário da melhor plataforma do mundo, o Mooodle Next Generation, que por sua vez, conta com a maior inteligência artificial já vista em Marte.', 
    'timecreated'   =>'20/08/2077', 
    'sourceimg'     =>'../images/image1.gif'
];

$news[] = $n1;
//inicio
// $out .= html_writer::start_tag('a',['href' => $CFG->wwwroot."/local/moodlenews/pages/index.php?id=".$value['id']]);
// $out .= html_writer::tag('h2', $n1['title']);
// $out .= html_writer::end_tag('div');

foreach ($news as $key => $value) {

$out .= html_writer::start_tag('div');
$out .= html_writer::tag('h1', $value['title']);
$out .= html_writer::tag('p', $value['content']);
$out .= html_writer::start_tag('div', ['class' => 'image-wrapper']);
$out .= html_writer::tag('img', null, ['src' => $value['sourceimg'], 'alt' => 'img_news', 'width' => 600, 'height'=> 'auto']);
$out .= html_writer::tag('p','Data: ' . $value['timecreated']);
$out .= html_writer::end_tag('div');
}

//printando a saída do html
echo $out;

//printando a saída do rodapé;
echo $OUTPUT->footer();

