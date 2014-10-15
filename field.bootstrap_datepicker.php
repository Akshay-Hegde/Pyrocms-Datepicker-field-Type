<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * PyroStreams Datepicker Field Type
 *
 * @package		PyroStreams
 * @author		Jose Luis Fonseca
 * @team                WeDreamPro
 * @copyright           Copyright (c) 2014, WeDreamPro
 */
class Field_bootstrap_datepicker {

    public $field_type_slug = 'bootstrap_datepicker';
    public $db_col_type = 'date';
    public $version = '1.0.0';
    public $author = array('name' => 'Jose Fonseca', 'url' => 'http://josefonseca.me');
    public $defaultFormat = 'd/m/Y';

    // ----------------------------------------------------------------------

    /**
     * Event
     *
     * Load assets
     *
     * @access public
     * @param $field object
     * @return void
     */
    public function event() {
        $this->CI->type->add_js('bootstrap_datepicker', 'bootstrap.min.js');
        $this->CI->type->add_css('bootstrap_time', 'bootstrap.css');
        $this->CI->type->add_js('bootstrap_time', 'datepicker.js');
        $this->CI->type->add_css('bootstrap_time', 'datepicker.css');
    }

    /**
     * Output form input
     *
     * @access	public
     * @param   $params	array
     * @return	string
     */
    public function form_output($params) {
        $value = $params['value'];
        if (!empty($value)) {
            $date = new DateTime(strtotime($value));
        } else {
            $date = new DateTime();
        }
        return $this->CI->type->load_view('bootstrap_datepicker', 'input', array(
                    'value' => $date->format($this->defaultFormat),
                    'nameform' => $params['form_slug'],
                    'format' => 'dd/mm/yyyy'
        ));
    }

    /**
     * Pre save
     * @param type $input
     * @param type $field
     * @param type $stream
     * @param type $row_id
     * @param type $form_data
     * @return type
     */
    public function pre_save($input, $field, $stream, $row_id, $form_data) {
        $date = date('Y-m-d',strtotime($input));
        return $date;
    }

    /**
     * Pre output
     * @param type $input
     * @param type $data
     * @return type
     */
    public function pre_output($input, $data) {
        $date = new DateTime($input);
        return $date->format($this->defaultFormat);
    }

    // ----------------------------------------------------------------------

}
