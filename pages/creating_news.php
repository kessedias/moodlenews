<?php

/**
 * Plugin de noticias do moodle - Arquivo de criação da notícia 📰 
 * 
 * @package local_moodlenews
 * @author 2020, Kesse Dias <kesse@eadskill.com.br>
 */

 require_once(__DIR__.'/../../../config.php');
 require_once('../forms/forms.php');

 require_login();

//Contexto definido para criação de capabilities
$context = context_system::instance();
$PAGE->set_context($context);
$PAGE->set_url($CFG->wwwroot. '/local/moodlenews/pages/creating_news.php', []);
$PAGE->set_pagelayout('admin');
$PAGE->set_title(get_string('create_news', 'local_moodlenews'));
$PAGE->set_heading(get_string('create_news', 'local_moodlenews'));

echo $OUTPUT->header();

//instanciando o formulário
$mform = new news_forms();

//o formulário tem 3 estamos: cancel, submit e display.

if($mform->is_cancelled()){

    //quando eu dou o submi, ele cria um objeto e manda para o get_data
}else if($data = $mform->get_data()){
    //chama o global session que tem como objetivo, gerenciar a sessão do moodle
    GLOBAL $_SESSION;

    $mform->display();
    //depois do display, cria um objeto(array)
    //time pega o horário atual do sistema em timestamp
    $SESSION->count[time()] = $data;
}else{
    $mform->display(); //exibe os elementos na tela

    //quando não vier nada
    $out = html_writer::start_tag('div', ['id' => 'alert', 'class' => 'alert alert-danger']);
    $out .= html_writer::tag('p', 'Nenhum conteúdo encontrado');
    $out .= html_writer::end_tag('div');
}

echo $out;

echo $OUTPUT->footer();