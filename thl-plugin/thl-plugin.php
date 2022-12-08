<!doctype html>
<html>
    <head>
        <title>Local Host</title>
</head>


   <body>
      <h1>Hola</h1>


<?php

/**
 * Plugin Name:       THL Plugin
 * Plugin URI:        https://tabbygarcia.com/
 * Description:       The Hotline's partner plugin
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Tabby Garcia
 * Author URI:        https://tabbygarcia.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       thl-plugin
 * Domain Path:       /languages
 */

 //security
 
if( !defined('ABSPATH') ){
    exit;
}

class ThlPlugin{

    public function __construct(){
        //create custom post type
        add_action('init',array($this,'create_custom_post_type') );

        //add assets (js,css,etc)
        add_action('wp_enqueue_scripts', array($this,'load_assets'));

        //add shortcode
        add_shortcode('thl-form', array($this, 'load_shortcode'));

    }

    public function create_custom_post_type(){
        $args = array(
            'public' => true,
            'has archive' => true,
            'supports' =>array('title'),
            'exclude_from_search' => true,
            'publicly_queryable' => false,
            'capability' => 'manage_options',
            'labels' => array(
                'name' => 'Contact Form',
                'singular_name' => 'Contact Form Entry'
            ),
            'menu_icon' => 'dashicons-media-text',
        );

        register_post_type('simple_contact_form', $args);

    }

    //create a new method for adding assets
    public function load_assets(){
        wp_enqueue_style(
            'thl-plugin',
            plugin_dir_url( __FILE__ ) . 'css/thl.css',
            array(),
            1,
            'all'
        );

        //1.handle aka name, 2.source, 3.dependencies/you can use other scripts as well, 4. version, 5.js in footer? true
        wp_enqueue_script(
            'thl-plugin',
            plugin_dir_url( __FILE__ ) . 'js/thl.js',
            array('jquery'),
            1,
            true

        );

    }


    //method for shortcode
    public function load_shortcode()
    {?>
       
        <div class="thl-contact-form">

            <h1>Send us an email</h1>
            <p>Please fill the below form</p>

        <form id="thl-contact-form__form">

        <div class="form-group mb-2">
                <input name="name" type="text" placeholder="Name" class="form-control">
            </div>

            <div class="form-group mb-2">
                <input name="email" type="email" placeholder="Email" class="form-control">
            </div>

            <div class="form-group mb-2">
                <input name="phone" type="tel" placeholder="Phone" class="form-control">
            </div>

            <div class="form-group mb-2">
                <textarea name="message" placeholder="Type your message" class="form-control"></textarea>
            </div>

            <div class="form-group mb-2">
                <button class="btn btn-success btn-block w-100">Send Message</button>
            </div>

       </form>

    </div>
    <?php }


}



new ThlPlugin;

?>

</body>
</html>