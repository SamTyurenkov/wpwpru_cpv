<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://windowspros.ru
 * @since      1.0.0
 *
 * @package    Wpwpru_cpv
 * @subpackage Wpwpru_cpv/public/partials
 */

if(is_single() == false) return;
$views = get_post_meta(get_the_ID(), 'wpwpru_cpv_pageviewer', true);
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<?php echo 'Views: '.esc_html($views) ?>