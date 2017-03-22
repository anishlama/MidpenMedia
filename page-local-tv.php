<?php
/**
 * Template Name: LOCAL TV (Two Sidebar Page Template)
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage MPM
 * @since Twenty Twelve 1.0
 */

get_header();

$selected_channel = "";

if( isset($_GET['channel']) ) {
    $selected_channel = trim($_GET['channel']) ;
?>

    <script type='text/javascript'>
	jQuery(document).ready(function(){
	    var channel = <?php echo $selected_channel; ?>;
	    jQuery("#whats-on a").each(function(index){
		var channel_no = jQuery(this).attr('channel');
		if ( channel == channel_no ) {
		    jQuery(this).trigger("click");
		}
		return;
	    });
	});
	
    </script>
<?php
}

?>
<script type='text/javascript'>
var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
	iPod: function() {
        return navigator.userAgent.match(/iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};

</script>
<div class="row" id="main-content-section">
	<?php get_sidebar( 'left' ); ?>
	<div id="primary" class="site-content local-tv">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<!-- Add code here -->
				
				
				
				
				<!-- End code here -->
				<?php get_template_part( 'content', 'page' ); ?>
                
				 <div id="wrapper" >
					<div class="tab-wrapper"  id="textExample">
                    <div id="video-con"><div class="tabbable tabs-right">

							<ul class="tab-content">
								<li id="pane1" class="tab-pane active">
									<div class="video-con" id='my-video26'></div>
									<script type='text/javascript'>
									if( isMobile.Android() ) {
										jQuery('#my-video26').html('<a href="rtsp://ss1.midpenmedia.org:1935/live-channels/ch26_2700kbps">Arts, Issues &amp; Entertainment</a>');
									} else {
										jwplayer('my-video26').setup({
											playlist: [{
												sources : [
													{ file: 'http://ss1.midpenmedia.org:1935/live-channels/ngrp:ch26_max2700kbps/jwplayer.smil' },
													{ file: 'http://ss1.midpenmedia.org:1935/live-channels/ngrp:ch26_max2700kbps/playlist.m3u8' }
												],
												// title: "Channel 26",
												image: '<?php echo get_template_directory_uri(); ?>/images/tv-img.png'
											 }],
											primary: "flash",
											width: '505',
											height: '265'
										});
									}
									</script>
									<p class="video-details"><?php print_now_and_next(26); ?></p>
								</li>
								<!--<li id="pane2" class="tab-pane">
									<div class="video-con" id='my-video27'></div>
										<script type='text/javascript'>
										if( isMobile.Android() ) {
											jQuery('#my-video27').html('<a href="rtsp://ss2.midpenmedia.org:1935/live-channels/ch27_max2700kbps">Arts, Issues &amp; Entertainment</a>');
										} else {
											jwplayer('my-video27').setup({
												playlist: [{
													sources : [
														{ file: 'http://ss2.midpenmedia.org:1935/live-channels/ngrp:ch27_max2700kbps/jwplayer.smil' },
														{ file: 'http://ss2.midpenmedia.org:1935/live-channels/ngrp:ch27_max2700kbps/playlist.m3u8' }
													],
													// title: "Channel 27",
													image: '<?php echo get_template_directory_uri(); ?>/images/tv-img.png'
												}],
												primary: "flash",
												width: '505',
												height: '265'
											});
										}
										</script>
									<p class="video-details"><?php //print_now_and_next(27); ?></p>
								</li>-->
								<li id="pane2" class="tab-pane">
									<div class="video-con" id='my-video28'></div>
									<script type='text/javascript'>
									if( isMobile.Android() ) {
										jQuery('#my-video28').html('<a href="rtsp://ss2.midpenmedia.org:1935/live-channels/ch28_2700kbps">Arts, Issues &amp; Entertainment</a>');
									} else {
										jwplayer('my-video28').setup({
											playlist: [{
												sources : [
													{ file: 'http://ss2.midpenmedia.org:1935/live-channels/ngrp:ch28_max2700kbps/jwplayer.smil' },
													{ file: 'http://ss2.midpenmedia.org:1935/live-channels/ngrp:ch28_max2700kbps/playlist.m3u8' }
												],
												// title: "Channel 28",
												image: '<?php echo get_template_directory_uri(); ?>/images/tv-img.png'
											 }],
											primary: "flash",
											width: '505',
											height: '265'
										});
									}
									</script>
									<p class="video-details"><?php print_now_and_next(28); ?></p>
								</li>
								<li id="pane3" class="tab-pane">
									<div class="video-con" id='my-video29'></div>
									<script type='text/javascript'>
									if( isMobile.Android() ) {
										jQuery('#my-video29').html('<a href="rtsp://ss1.midpenmedia.org:1935/live-channels/ch29_200kbps">Arts, Issues &amp; Entertainment</a>');
									} else {
										jwplayer('my-video29').setup({
											playlist: [{
												sources : [
													{ file: 'http://ss1.midpenmedia.org:1935/live-channels/ngrp:ch29_max2700kbps/jwplayer.smil' },
													{ file: 'http://ss1.midpenmedia.org:1935/live-channels/ngrp:ch29_max2700kbps/playlist.m3u8' }
												],
												// title: "Channel 29",
												image: '<?php echo get_template_directory_uri(); ?>/images/tv-img.png'
											 }],
											primary: "flash",
											width: '505',
											height: '265'
										});
									}
									</script>
									<p class="video-details"><?php print_now_and_next(29); ?></p>
								</li>
								<li id="pane4" class="tab-pane">
									<div class="video-con" id='my-video30'></div>
									<script type='text/javascript'>
									if( isMobile.Android() ) {
										jQuery('#my-video30').html('<a href="rtsp://ss2.midpenmedia.org:1935/live-channels/ch30_2700kbps">Arts, Issues &amp; Entertainment</a>');
									} else {
										jwplayer('my-video30').setup({
											playlist: [{
												sources : [
													{ file: 'http://ss2.midpenmedia.org:1935/live-channels/ngrp:ch30_max2700kbps/jwplayer.smil' },
													{ file: 'http://ss2.midpenmedia.org:1935/live-channels/ngrp:ch30_max2700kbps/playlist.m3u8' }
												],
												// title: "Channel 30",
												image: '<?php echo get_template_directory_uri(); ?>/images/tv-img.png'
											 }],
											primary: "flash",
											width: '505',
											height: '265'
										});
									}
									</script>
									<p class="video-details"><?php print_now_and_next(30); ?></p>
								</li>
								<li id="pane5" class="tab-pane">
									<div class="video-con" id='my-video75'></div>
									<script type='text/javascript'>
									if( isMobile.Android() ) {
										jQuery('#my-video75').html('<a href="rtsp://ss2.midpenmedia.org:1935/live-channels/ch75_max2700kbps">Arts, Issues &amp; Entertainment</a>');
									} else {
										jwplayer('my-video75').setup({
											playlist: [{
												sources : [
													{ file: 'http://ss2.midpenmedia.org:1935/live-channels/ngrp:ch75_max2700kbps/jwplayer.smil' },
													{ file: 'http://ss2.midpenmedia.org:1935/live-channels/ngrp:ch75_max2700kbps/playlist.m3u8' }
												],
												// title: "Channel 27",
												image: '<?php echo get_template_directory_uri(); ?>/images/tv-img.png'
											}],
											primary: "flash",
											width: '505',
											height: '265'
										});
									}
									</script>
									<p class="video-details"><?php print_now_and_next(75); ?></p>
								</li>
								<li id="pane6" class="tab-pane">
									<div class="video-con" id='my-video27'></div>
									<script type='text/javascript'>
									if( isMobile.Android() ) {
										jQuery('#my-video27').html('<a href="http://reflect.channel27.creatv.cablecast.tv/live/live.m3u8">Arts, Issues &amp; Entertainment</a>');
									} else {
										jwplayer('my-video27').setup({
											playlist: [{
												sources: [
													{ file: 'http://reflect.channel27.creatv.cablecast.tv/live/live.m3u8' }

												],
												// title: "Channel 27",
												image: '<?php echo get_template_directory_uri(); ?>/images/tv-img.png'
											}],
											primary: "flash",
											width: '505',
											height: '265'
										});
									}
									</script>
									<p class="video-details"><?php // print_now_and_next(27); ?></p>
								</li>
							</ul><!-- /.tab-content -->

						</div></div>
                    <div id="whats-on">						<div class="tab-head">What's On Now</div>
                    <ul class="nav nav-tabs verticalslider_tabs">
								<li class="active"><a href="#pane1" ss-no="1" channel="26" id="channel-26" data-toggle="tab">Government etc
									<br />Channel 26</a>
									<div class="arrow"></div>
								</li>
								<li><a href="#pane6" ss-no="2" channel="27" id="channel-27" data-toggle="tab">Bay Voice TV Regional Programming
									<br />Channel 27</a>
									<div class="arrow"></div>
								</li>
								<li><a href="#pane2" ss-no="2" channel="28" id="channel-28" data-toggle="tab">Youth, Education and Sports
									<br />Channel 28</a>
									<div class="arrow"></div>
								</li>
								<li><a href="#pane3" ss-no="1" channel="29" id="channel-29" data-toggle="tab">Government etc
									<br />Channel 29</a>
									<div class="arrow"></div>
								</li>
								<li><a href="#pane4" ss-no="2" channel="30" id="channel-30" data-toggle="tab">Arts, Issues and Lifestyles
									<br />Channel 30</a>
									<div class="arrow"></div>
								</li>
								<li><a href="#pane5" ss-no="2" channel="75" id="channel-75" data-toggle="tab">Diversity and Culture
									<br />Channel 75</a>
									<div class="arrow"></div>
								</li>
							</ul>
		    </div>
                    <div class="clear"></div>
                    <span class="video-option"><p>Is your monthly data usage limited? Select the maximum data rate for playing this video</p> 
									<label class="radio-inline">
										<input type="radio" name="bitrates" id="inlineRadio1" value="2700kbps" checked="checked"> 2700 <span>kbps (MAX)</span>
									</label>
									<label class="radio-inline">
										<input type="radio" name="bitrates" id="inlineRadio2" value="1600kbps"> 1600 <span>kbps</span>
									</label>
									<label class="radio-inline">
										<input type="radio" name="bitrates" id="inlineRadio3" value="1100kbps"> 1100 <span>kbps</span>
									</label>
									<label class="radio-inline">
										<input type="radio" name="bitrates" id="inlineRadio4" value="800kbps"> 800 <span>kbps</span>
									</label>
									<label class="radio-inline">
										<input type="radio" name="bitrates" id="inlineRadio5" value="500kbps"> 500 <span>kbps</span>
									</label>
									<label class="radio-inline">
										<input type="radio" name="bitrates" id="inlineRadio6" value="200kbps"> 200 <span>kbps (MIN)</span>
									</label>

							</span>
					</div>
 
				</div>
				<hr width="100%" />
				<!--<iframe width="100%" height="500" src="http://midpenmedia.org/program/program-list.php"></iframe> -->
				<?php
				include_once("program-schedule-table.php");
				comments_template( '', true );
				?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
</div>
<div class="loading-image-div"><!-- Place at bottom of page --></div>

    <script type='text/javascript'>
	jQuery(document).ready(function(){
	    <?php
		if( isset($_GET['channel']) ) :
		    $selected_channel = trim($_GET['channel']) ;
		?>
	    var channel = <?php echo $selected_channel; ?>;
	    jQuery( "a#channel-"+channel ).trigger("click");
		<?php endif; ?>
		
		
		jQuery(' #whats-on a').on("click", function() {
			channel = jQuery(this).attr('channel');
			ss_no =  jQuery(this).attr('ss-no');
			bit_rate = jQuery( ".video-option input:radio[name=bitrates]:checked" ).val();
			if ( channel == 27 ) {
				jwplayer('my-video' + channel).setup({
					playlist: [{
						sources: [
							{ file: 'http://reflect.channel27.creatv.cablecast.tv/live/live.m3u8' }

						],
						title: "Channel ' + channel + '"
						// image: '<?php echo get_template_directory_uri(); ?>/images/tv-img.png'
					 }],
					primary: "flash",
					width: '505',
					height: '265'
				});
		
				jwplayer('my-video' + channel).play();
				
			} else {
				jwplayer('my-video' + channel).setup({
					playlist: [{
						sources : [
							{ file: 'http://ss' + ss_no + '.midpenmedia.org:1935/live-channels/ngrp:ch' + channel + '_max' + bit_rate + '/jwplayer.smil' },
							{ file: 'http://ss' + ss_no + '.midpenmedia.org:1935/live-channels/ngrp:ch' + channel + '_max' + bit_rate + '/playlist.m3u8' }
						],
						title: "Channel ' + channel + '"
						// image: '<?php echo get_template_directory_uri(); ?>/images/tv-img.png'
					 }],
					primary: "flash",
					width: '505',
					height: '265'
				});
		
				jwplayer('my-video' + channel).load([
						{ file: 'http://ss' + ss_no + '.midpenmedia.org:1935/live-channels/ngrp:ch' + channel + '_max' + bit_rate + '/jwplayer.smil' },
						{ file: 'http://ss' + ss_no + '.midpenmedia.org:1935/live-channels/ngrp:ch' + channel + '_max' + bit_rate + '/playlist.m3u8' }
				]);
				jwplayer('my-video' + channel).play();
			}
			

		});
	
		jQuery(' .video-option input:radio').on("click", function() {
			bit_rate = jQuery(this).val();
			if( isMobile.Android() ) {
				jQuery('#my-video' + channel).html('<a href="rtsp://ss' + ss_no + '.midpenmedia.org:1935/live-channels/ch' + channel + '_' + bit_rate + '">Arts, Issues &amp; Entertainment</a>');
			} else {
				jwplayer('my-video' + channel).load([
					{ file: 'http://ss' + ss_no + '.midpenmedia.org:1935/live-channels/ngrp:ch' + channel + '_max' + bit_rate + '/jwplayer.smil' },
					{ file: 'http://ss' + ss_no + '.midpenmedia.org:1935/live-channels/ngrp:ch' + channel + '_max' + bit_rate + '/playlist.m3u8' }
				]);
				jwplayer('my-video' + channel).play();
			}

		});
	});
	
    </script>
<?php

get_footer(); 

?>