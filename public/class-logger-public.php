<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://wplogger.asdat.info/
 * @since      1.0.0
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Logger
 * @subpackage Logger/public
 */

use Analog\Logger as AnalogLogger;
use Analog\Handler\File;

class Logger_Public
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
     * Log writer wrapper.
     *
     * @since    1.0.0
     * @access   private
     * @var      AnalogLogger $logger Logger wrapper.
     */
    private $logger;

    /**
     * Initialize the class and set its properties.
     *
     * @param string $plugin_name The name of the plugin.
     * @param string $version The version of this plugin.
     * @since    1.0.0
     */
    public function __construct($plugin_name, $version)
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
        $this->logger = new AnalogLogger();
        $this->logger->handler(File::init('log.txt'));
    }

    public function login($user_login, $user)
    {
        $this->log_user_action($user, 'logged in');
    }

    public function logout()
    {
        $this->log_user_action(wp_get_current_user(), 'logged out');
    }

    /**
     * Write current user information into log file
     *
     * @param WP_User $user
     * @param string $message
     */
    protected function log_user_action(WP_User $user, $action)
    {
        if ($user->ID) {
            $this->logger->info(
                'User {username} {action} from {IP}',
                [
                    'username' => $user->user_login,
                    'IP'       => $this->get_ip(),
                    'action'   => $action
                ]
            );
        }
    }

    protected function get_ip()
    {
        if ( !empty($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        }

        if ( !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }

        return $_SERVER['REMOTE_ADDR'];
    }
}
