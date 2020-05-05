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
<div id="titlediv">
    <input type="text" name="log_path" id="log_path" required value="<?php echo $log_path; ?>" style="width:250px">
    <br>
    <span class="description">Path on server for logs file. Please don't add slash to the beginning or the end</span>
</div>
