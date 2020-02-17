<?php

/**
 * Plugin de noticias do moodle - Arquivo de Versionamento
 * 
 * @package local_moodlenews
 * @author 2020, Kesse Dias <kesse@eadskill.com.br>
 */

 //Defina ou morra, aqui você insere as configurações da cada parâmetro referente ao componente $plugin
 defined('MOODLE_INTERNAL') || die();

 $plugin->component = 'local_moodlenews';
 $plugin->version = '2020021700';
 $plugin->requires = '2018120300'; //precisa do moodle 3.6
 $plugin->release = 'v1.0.0';
