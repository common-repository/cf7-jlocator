<?php

    /**
     * User: Daschmi (daschmi@daschmi.de)
     * Date: 17.09.17
     * Time: 20:10
     */

    namespace cfjl;

    class Wpcf7
    {

        public static function renderField($field)
        {

            if (!isset($GLOBALS['cfjl'])) $GLOBALS['cfjl'] = array();

            $strReturn = '<input type="text" class="form-control loadAdress_bs" name="street" placeholder="Straße" value="" />';

            return $strReturn;

        }

        public static function street($tag)
        {

            var_dump($tag);

            return self::renderField('street');

        }

    }