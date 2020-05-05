<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://wplogger.asdat.info/
 * @since      1.0.0
 *
 * @package    Logger
 * @subpackage Logger/admin/partials
 */
?>
<form method="post" action="<?php echo admin_url('options.php'); ?>">
    <?php wp_nonce_field(); ?>
    <input type="hidden" name="action" value="logger_settings">
    <?php settings_fields('logger-settings');?>
    <?php do_settings_sections('logger-settings')?>
    <?php submit_button();?>
</form>
