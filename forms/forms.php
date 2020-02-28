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

        /**
         * primeiro parâmetro é o tipo do elemento
         * o segundo parâmetro é o id
         * o terceiro é o conteúdo
         * o quarto é um array de atributos
         */

        $mform->addElement('header', 'head_guide', get_string('news_guide', 'local_moodlenews'));
        $mform->addElement('text', 'txt_title', get_string('news_title', 'local_moodlenews'), ['placeholder' => get_string('news_insert_placeholder', 'local_moodlenews')]);
        $mform->addElement('textarea', 'txta_desc', get_string('news_description', 'local_moodlenews'), ['placeholder' => get_string('news_description_placeholder', 'local_moodlenews'), 'cols' => 50, 'rows' => 2]);
        $mform->addElement('textarea', 'txta_content', get_string('news_content', 'local_moodlenews' ), ['placeholder' => get_string('news_content_placeholder', 'local_moodlenews'), 'cols' => 50, 'rows' => 5]);
        $mform->addElement('text', 'sourceimg', get_string('news_image', 'local_moodlenews'), ['placeholder' => get_string('news_image_placeholder', 'local_moodlenews')]);
        $mform->addElement('text', 'bannerimg', get_string('news_banner', 'local_moodlenews'), ['placeholder' => get_string('news_banner_placeholder', 'local_moodlenews')]);

        //definindo os tipos
            $mform->setType('head_guide',PARAM_TEXT);
            $mform->setType('txt_title',PARAM_TEXT);
            $mform->setType('txta_desc',PARAM_TEXT);
            $mform->setType('txta_content',PARAM_TEXT);
            $mform->setType('sourceimg',PARAM_TEXT);
            $mform->setType('bannerimg',PARAM_TEXT);

        //Adicionando regras
        $mform->addRule('txt_title', 'O campo título é obrigatório', 'required', 'server');
        $mform->addRule('txta_desc', 'O campo descrição é obrigatório', 'required', 'server');
        $mform->addRule('txta_content', 'O campo conteúdo é obrigatório', 'required', 'server');
        $mform->addRule('sourceimg', 'A inserção do link da imagem de capa é obrigatória', 'required', 'server');
        $mform->addRule('bannerimg', 'A inserção do link de imagem do banner é obrigatória', 'required', 'server');



        //botões pré pronto do moodle
        //primeiro parâmetro habilita ou não o botão cancelar
        $this->add_action_buttons(true, 'Criar notícia');
    
    } 
}