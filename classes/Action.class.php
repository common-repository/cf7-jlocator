<?php

    /**
     * User: Daschmi (daschmi@daschmi.de)
     * Date: 25.08.17
     * Time: 15:10
     */

    namespace cfjl;

    class Action
    {

        public static function option_page()
        {

            $wp_upload_dir = \wp_upload_dir();
            $path = $wp_upload_dir['basedir'].DIRECTORY_SEPARATOR.'cfjl'.DIRECTORY_SEPARATOR;
            mkdir($path, 0777, true);
            $path = $path.'jLocator.js';

            if (isset($_REQUEST['submit']))
            {

                if (in_array($_REQUEST['cfjl_include_googlemaps'], array('0', '1')))
                {

                    update_option('cfjl_include_googlemaps', sanitize_text($_REQUEST['cfjl_include_googlemaps']));
                }

                update_option('cfjl_googlemaps_apikey', sanitize_text($_REQUEST['cfjl_googlemaps_apikey']));

                @move_uploaded_file($_FILES['cfjl_file']['tmp_name'], $path);

                header('Location: options-general.php?page=cfjl&cfjl_confirm');
                exit;

            }

            $oRenderer = new Renderer();
            $oRenderer->view['path'] = $path;

            echo $oRenderer->render(CFJL_ROOT.'/views/option_page.phtml');

        }
        public static function admin_menu()
        {

            \add_options_page(__('jLocator', 'cf7-jlocator'), __('jLocator', 'cf7-jlocator'), 'manage_options', 'cfjl', array('\cfjl\Action', 'option_page'));

        }

        public static function plugins_loaded()
        {

            load_plugin_textdomain('cf7-jlocator', false, basename(dirname(__FILE__)).'/../languages');

        }

        public static function init()
        {


        }

        public static function wp_enqueue_scripts()
        {

            if (get_option('cfjl_include_googlemaps') === '1')
            {

                wp_enqueue_script('cfjl-gm', 'https://maps.googleapis.com/maps/api/js?key='.get_option('cfjl_googlemaps_apikey'), array(), '1.0', true);

            }

            wp_enqueue_style('cfjl-style', plugin_dir_url(CFJL_ROOTFILE).'/css/jlocator.css');

            $wp_upload_dir = \wp_upload_dir();
            $path = $wp_upload_dir['basedir'].DIRECTORY_SEPARATOR.'cfjl'.DIRECTORY_SEPARATOR.'jLocator.js';

            if (file_exists($path))
            {

                wp_enqueue_script('cfjl-script', $wp_upload_dir['baseurl'].'/cfjl/jLocator.js', array('jquery'), '1.0', false);

            }
            else if (file_exists(dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'js'.DIRECTORY_SEPARATOR.'jLocator.js'))
            {

                wp_enqueue_script('cfjl-script', plugin_dir_url(CFJL_ROOTFILE).'js/jLocator.js', array('jquery'), '1.0', false);

            }

        }

        public static function wp_footer()
        {

            $strReturn  = '<script>';
            $strReturn .= 'jQuery(".jLocator").jLocator( {';
            $strReturn .= '  "allFields": true,';
            $strReturn .= '  "link_class_loading": "loading",';
            $strReturn .= '  "fields": {';
            $strReturn .= '    "street": "input.jLocator_street",';
            $strReturn .= '    "street_number": "input.jLocator_street_number",';
            $strReturn .= '    "zip": "input.jLocator_zip",';
            $strReturn .= '    "city": "input.jLocator_city",';
            $strReturn .= '    "district": "input.jLocator_district",';
            $strReturn .= '    "state": "input.jLocator_state",';
            $strReturn .= '    "country": "input.jLocator_country"';
            $strReturn .= '  }';
            $strReturn .= '} );';
            $strReturn .= '</script>';

            echo $strReturn;

        }

    }