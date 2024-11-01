<?php
/**
 * Plugin Name:       Simple Video Background Block
 * Description:       The plugin that allows to add YouTube video backgrounds to Gutenberg blocks.
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Aykan Burcak
 * Author URI:        https://www.aykanburcak.com
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       video-background
 *
 * @package           create-block
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function create_block_youtube_video_background_block_init() {
	register_block_type( __DIR__ . '/build' );
}
add_action( 'init', 'create_block_youtube_video_background_block_init' );

function youtube_video_background_block_assets() {
	$id = get_the_ID();
	if (has_block('create-block/video-background', $id)) {
        wp_enqueue_script ( 'video-background', plugin_dir_url( __FILE__ ) . 'scripts/youtube-video-background.js', '', '', true );
	}
}
add_action( 'enqueue_block_assets', 'youtube_video_background_block_assets' );
