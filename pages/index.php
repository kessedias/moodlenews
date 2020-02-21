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
$news = [];

$n1 = [
    'id'            => 1,
    'title'         =>'O melhor Moodle do mundo', 
    'description'   => 'O Moodle Next Generation completa mais um aniversário e agora todo mundo quer um pedaço deste bolo. Com a evolução crecente da plataforma, o sabor está ficando cada vez melhor.',
    'content'       =>'Estamos em 2077 e hoje completa o aniversário da melhor plataforma do mundo, o Mooodle Next Generation, que por sua vez, conta com a maior inteligência artificial já vista em Marte.', 
    'timecreated'   =>'20/08/2077', 
    'sourceimg'     =>'../images/image1.gif',
    'bannerimg'     =>'../images/banner2.jpg'
];

$n2 = [
    'id'            => 2,
    'title'         =>'O Moodle está dominando o Sistema Solar', 
    'description'   => 'Com a dominação mundial do Moodle, surgem os primeiros LMS na Lua. As expectativas é um trilhão de LMS vendidos até o fim do mês',
    'content'       =>'O mundo mudou e agora, com a economia aquecida, o Moodle cresce cada vez mais, dominando o mercado do Sistema Solar. Yang Zeng, filho do criador do Moodle, diz que as expectativas são altíssimas e o mercado tem de a cada vez mais alimentar a economia descentralizada devido a grande expansão de LMS', 
    'timecreated'   =>'21/08/2077', 
    'sourceimg'     =>'../images/image2.jpg',
    'bannerimg'     =>'../images/banner.jpg'
];

$n3 = [
    'id'            => 3,
    'title'         =>'Inteligência artificial no Moodle', 
    'description'   => 'O Moodle Next Generation aprimorou mais uma vez o seu algoritmo quântico, e os LMS estão criando vida!',
    'content'       =>'É meus amigos, a Terra que se prepare! O Moodle agora é uma plataforma LMS auto-consciente que cria o seus próprios treinamentos com base nas necessidades do aluno. Os desenvolvedor Sannins em Moodle, Lucas e Hugo, disseram que nunca antes o Moodle havia ficado tão inteligente e prestativo.', 
    'timecreated'   =>'22/08/2077', 
    'sourceimg'     =>'../images/image3.jpg',
    'bannerimg'     =>'../images/banner3.jpg'
];

//atribuindo as noticias no array de news
$news[] = $n1;
$news[] = $n2;
$news[] = $n3;

//aqui eu to pegando a varíavel id que está sendo recebida de description_news e comparando com a posição e valor do array
$newsid = --$id;
//inicio
$out .= html_writer::start_tag('div');
$out .= html_writer::tag('h1', $news[$newsid]['title']);
$out .= html_writer::tag('p', $news[$newsid]['content']);
$out .= html_writer::start_tag('div', ['class' => 'image-wrapper']);
$out .= html_writer::tag('img', null, ['src' => $news[$newsid]['sourceimg'], 'alt' => 'img_news', 'width' => 600, 'height'=> 'auto', 'id' => 'change_img']);
$out .= html_writer::tag('p','Data: ' . $news[$newsid]['timecreated']);
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

