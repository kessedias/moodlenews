<?php

/**
 * Plugin de noticias do moodle - Arquivo de criação da notícia 📰 
 * 
 * @package local_moodlenews
 * @author 2020, Kesse Dias <kesse@eadskill.com.br>
 */

 
//moodleform é uma classe padrão do moodle e deverá ser chamada no forms.php sempre que houver formulários no plugin
require_once("$CFG->libdir/formslib.php");

//A classe que eu criei (news_forms) herda através do extends os métodos de "moodleform"
class news_forms extends moodleform {

    //Adicionando os elementos ao formulário
    public function definition(){
        global $CFG;

        //chamada do form
        $mform = $this->_form;
    }
}