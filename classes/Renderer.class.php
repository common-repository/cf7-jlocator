<?php

    /**
     * User: Daschmi (daschmi@daschmi.de)
     * Date: 05.09.17
     * Time: 20:37
     */

    namespace cfjl;

    class Renderer
    {

        public $view = array();

        public function render($template)
        {

            ob_start();
            include $template;
            $content = ob_get_contents();
            ob_end_clean();

            return $content;

        }

    }