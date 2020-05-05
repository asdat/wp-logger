<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://wplogger.asdat.info/
 * @since      1.0.0
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Logger
 * @subpackage Logger/admin
 */
class Logger_Admin
{
    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $plugin_name The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @param string $plugin_name The name of this plugin.
     * @param string $version The version of this plugin.
     * @since    1.0.0
     */
    public function __construct($plugin_name, $version)
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Add plugin admin pages
     *
     * @since    1.0.0
     */
    public function add_pages()
    {
        add_options_page('Logger settings', 'Logger', 'manage_options', 'Logger-plugin', [$this, 'add_options_page']);
    }

    /**
     * Add plugin options page
     *
     * @since    1.0.0
     */
    public function add_options_page()
    {
        if (!current_user_can('manage_options')) {
            wp_die(__('You do not have sufficient permissions to access this page.'));
        }

        require_once 'partials/logger-admin-options.php';
    }

    /**
     * Initialize Logger plugins
     * settings
     */
    public function settings_init()
    {
        add_settings_section('logger-settings-section', 'Logger settings', '', 'logger-settings');
        add_settings_field(
            'log_path',
            'Log file path',
            [$this, 'log_path'],
            'logger-settings',
            'logger-settings-section'
        );
    }

    /**
     * Set path for logs
     */
    public function log_path()
    {
        $log_path = esc_attr(get_option('log_path', ''));
        require_once 'partials/logger-log-path.php';
    }
}
