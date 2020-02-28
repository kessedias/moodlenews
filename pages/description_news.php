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


$out .= html_writer::start_tag('div');
$out .= html_writer::tag('h1', 'G1 do Moodle');
//estrutura de repetição
foreach ($news as $key => $value) {
    
$out .= html_writer::start_tag('div', null, ['class' => 'mb-3']);
$out .= html_writer::tag('img', null, ['class' => 'card-img-top img-test','src' => $value['bannerimg'], 'alt' => 'img_teste']);
$out .= html_writer::start_tag('div', ['class' => 'card-body']);
$out .= html_writer::start_tag('a', ['href' => $CFG->wwwroot."/local/moodlenews/pages/index.php?id=".$value['id']]);
$out .= html_writer::tag('h2', $value['title'], ['class' => 'card-title']);
$out .= html_writer::end_tag('a');
$out .= html_writer::tag('p', $value['description'], ['class' => 'card-text']);
$out .= html_writer::end_tag('div');

}

if(isset($SESSION->news)){
    foreach($SESSION->news as $key => $value){;

        $out .= html_writer::start_tag('div', null, ['class' => 'mb-3']);
        $out .= html_writer::tag('img', null, ['class' => 'card-img-top img-test','src' => $value->bannerimg, 'alt' => 'img_teste']);
        $out .= html_writer::start_tag('div', ['class' => 'card-body']);
        $out .= html_writer::start_tag('a', ['href' => $CFG->wwwroot."/local/moodlenews/pages/index_content.php?id=". $key]);
        $out .= html_writer::tag('h2', $value->txt_title, ['class' => 'card-title']);
        $out .= html_writer::end_tag('a');
        $out .= html_writer::tag('p', $value->txta_desc, ['class' => 'card-text']);
        $out .= html_writer::end_tag('div');
       
    } 
}else{
    $out .= html_writer::tag('img', null, ['class' => 'card-img-top img-test','src' => 'https://media.tenor.com/images/dac79996006d7dd97e7097c2662bab74/tenor.gif', 'alt' => 'img_cat']);
}



//printando a saída do html
echo $out;
//print('Teste' . '<pre>');
//var_dump($SESSION->news);
//printando a saída do rodapé;
echo $OUTPUT->footer();
