<?php

/**
 * Author: johansylvan
 * Date: 2016-10-05
 * Time: 14:36
 */

$general_options = get_option( 'cookies_general_options' );
$content_options = get_option( 'cookies_content_options' );
$styling_options = get_option( 'cookies_styling_options' );
?>


<?php if ( isset( $_COOKIE['cookie-warning-message'] ) ) { ?>
	<style>
		.container-cookies {
			display: none !important;
		}
	</style>
<?php } ?>

<style>

	.cookie-block {
	<?php if(!empty($styling_options['message_color_picker'])) { ?> background-color: <?php echo $styling_options['message_color_picker'];?>;
	<?php } ?><?php if(!empty($styling_options['opacity_slider_amount']) && absint($styling_options['opacity_slider_amount']) > 0) { ?> opacity: <?php echo absint($styling_options['opacity_slider_amount'])/100;?>;
	<?php } ?>
	}

	<?php if(!empty($styling_options['message_height_slider_amount'])) { ?>
	#custom-cookie-message-container.container-cookies {
		padding: <?php echo $styling_options['message_height_slider_amount'];?>px 0 <?php echo $styling_options['message_height_slider_amount'];?>px 0;
	}

	<?php } ?>
	<?php if(!empty( $styling_options['text_color_picker'] )){ ?>
	#custom-cookie-message-container.container-cookies p {
		color: <?php echo $styling_options['text_color_picker'];?>;
	}

	<?php } ?>
	<?php if(!empty( $styling_options['link_color_picker'] )){ ?>
	#custom-cookie-message-container.warning-text a:link {
		color: <?php echo $styling_options['link_color_picker'];?> !important;
	}

	<?php } ?>

	#cookies-button-ok.cookies-button-ok {
	<?php if(!empty( $styling_options['button_color_picker'] )){ ?> background-color: <?php echo $styling_options['button_color_picker'];?>;
	<?php } ?><?php if(!empty( $styling_options['button_text_color_picker'] )){ ?> color: <?php echo $styling_options['button_text_color_picker'];?>;
	<?php } ?><?php if(!empty( $styling_options['button_height_slider_amount'] )){ ?> padding-top: <?php echo $styling_options['button_height_slider_amount'];?>px;
		padding-bottom: <?php echo $styling_options['button_height_slider_amount'];?>px;
	<?php } ?><?php if(!empty( $styling_options['button_width_slider_amount'] )){ ?> padding-left: <?php echo $styling_options['button_width_slider_amount'];?>px;
		padding-right: <?php echo $styling_options['button_width_slider_amount'];?>px;
	<?php } ?>
	}

	#cookies-button-ok.cookies-button-ok:hover {
		background-color: <?php echo $styling_options['button_hover_color_picker'];?>;
	}
</style>
<div id="custom-cookie-message-container" class="container-cookies <?php echo $general_options['location_options']; ?> container-cookies--<?php echo $general_options['location_options']; ?>">
	<div class="cookie-block"></div>
	<div class="cookie-content">
		<div class="warning-text">
			<p <?php echo( empty( $styling_options['text_font'] ) ? '' : 'style=”font-family: ' . $styling_options['text_font'] . '“' ); ?> ><?php echo $content_options['textarea_warning_text']; ?>
				<a style="color: <?php echo $styling_options['link_color_picker']; ?>"
				   href=" <?php echo $general_options['cookies_page_link']; ?>"><?php _e( $content_options['input_link_text'], 'cookie-message' ); ?></a>
			</p>
			<a id="cookies-button-ok"
			   class="cookies-button-ok <?php echo( ! empty( $styling_options['add_button_class'] ) ? $styling_options['add_button_class'] : 'default-cookie-button-style' ); ?>">
				<?php _e( $content_options['input_button_text'], 'cookie-message' ); ?>
			</a>
		</div>
	</div>
</div>
