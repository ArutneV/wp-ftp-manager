<?php
/*
Plugin Name: AppAlliance FTP Manager
Description: FTP accounts manager for wordpress.
Version: 1.0
Author: AppAlliance
Author URI: http://appalliance.co.za
*/

//menu items
add_action('admin_menu','awpk_ftp_modifymenu');
function awpk_ftp_modifymenu() {

    //this is the main item for the menu
    add_menu_page('FTP Manager', //page title
    'FTP Manager', //menu title
    'manage_options', //capabilities
    'awpk_ftp_list', //menu slug
    sinetiks_schools_list //function
    );

    //this is a submenu
    add_submenu_page('awpk_ftp_list', //parent slug
    'Add New Entry', //page title
    'Add New', //menu title
    'manage_options', //capability
    'awpk_ftp_entry_create', //menu slug
    'sinetiks_schools_create'); //function

    //this submenu is HIDDEN, however, we need to add it anyways
    add_submenu_page(null, //parent slug
    'Update Entry', //page title
    'Update', //menu title
    'manage_options', //capability
    'awpk_ftp_update', //menu slug
    'sinetiks_schools_update'); //function
}
define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'ftp-list.php');
require_once(ROOTDIR . 'ftp-create.php');
require_once(ROOTDIR . 'ftp-update.php');
