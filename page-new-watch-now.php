<?php
/**
 * Template Name: Watch Now New Hidden Page1
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

$thisfile = "page-new-watch-now.php";
date_default_timezone_set("America/Los_Angeles");
$table_background = "#CCCCCC";
$table_border = "#CCCCCC";
$main_content_bg = "#6699CC";
$channel_bg = "#999999";
$show_cell = "#323366";


/*
* get the request from the user
* $action  = search or newstart
* $newtime = time sleceted in the time dropdown
* $newdate = date sleceted in the date dropdown
*/
$action  = isset($_GET['action'])  ? $_GET['action']  : "" ;
$newtime = isset($_GET['newtime']) ? $_GET['newtime'] : "" ;
$newdate = isset($_GET['newdate']) ? $_GET['newdate'] : "" ;

//no request . Load the default program from the current time.By default, start right now
if ( !$action ) {
	//get_feed_data();
	$shr   = date("H");  //current starting hour
	$smin  = "00";       //current starting minute .. it always set to zero
	$smon  = date("m");  //current month
	$sday  = date("d");  //current day
	$syear = date("Y");  //current year

} elseif ( $action == "newstart" ) {

	/*if they have selected a new start time, go there
	* newtime HH:MM
	* newdate YYYY-MM-DD */
	$shr   = substr($newtime, 0, 2);   //retrive selected hour
	$smin  = substr($newtime, 3, 2);   //retrive selected mins
	$smon  = substr($newdate, 5, 2);   //retrive selected month
	$sday  = substr($newdate, 8, 2);   //retrive selected day
	$syear = substr($newdate, 0, 4);   //retrive selected year

}



//set the start date time what need to show
$start = $syear."-".$smon."-".$sday." ".$shr.":".$smin.":00";
//set the start date
$thisdate = $syear."-".$smon."-".$sday;
//set the start time
$thistime = $shr.":".$smin;

$remaing_hour_of_day = 24 - $shr;
$length = $remaing_hour_of_day * 60 - $smin;
//syn: Hardwired time window 2 hours after start time 
$end = date("Y-m-d H:i:00", mktime(23,59,0,$smon,$sday,$syear));


//set the previous date time what need to show
//$prevdate = date("Y-m-d", mktime($shr-1,$smin,0,$smon,$sday,$syear));
//$prevtime = date("H:i", mktime($shr-1,$smin,0,$smon,$sday,$syear));

$prevdate = date("Y-m-d", mktime(0,0,0,$smon,$sday-1,$syear));
$prevtime = date("H:i", mktime(0,0,0,$smon,$sday,$syear));


//set the next date time what need to show
//$nextdate = date("Y-m-d", mktime($shr+1,$smin,0,$smon,$sday,$syear));
//$nexttime = date("H:i", mktime($shr+1,$smin,0,$smon,$sday,$syear));

$nextdate = date("Y-m-d", mktime(0,0,0,$smon,$sday+1,$syear));
$nexttime = date("H:i", mktime(0,0,0,$smon,$sday+1,$syear));

$selected_channel = "";

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
<style>
.page-template-page-new-watch-now-hidden-page #primary{
	padding-left:200px;
	
}

</style>

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
								
								<?php
								
								$pane_id	=	1;
								
								$channel_list	=	array(
													array("id"	=>	26, "server_id"	=>	1, "title" =>	"Government etc" ),
													array("id"	=>	27, "server_id"	=>	2, "title" =>	"Bay Voice TV Regional Programming", 'url'	=> 'http://reflect.channel27.creatv.cablecast.tv/live/live.m3u8' ),
													array("id"	=>	28, "server_id"	=>	2, "title" =>	"Youth, Education and Sports" ),
													array("id"	=>	29, "server_id"	=>	1, "title" =>	"Government etc" ),
													array("id"	=>	30, "server_id"	=>	2, "title" =>	"Arts, Issues and Lifestyles" ),
													array("id"	=>	75, "server_id"	=>	2, "title" =>	"Diversity and Culture" ),
												);
								$output_string	=	'';
								foreach($channel_list as $ch):
								
									$ch_id	=	$ch["id"];
									$ch_title	=	$ch["title"];
									$server_id	=	$ch["server_id"];
									
									$is_active	=	$pane_id	==	1 ? ' active ' : '';
									
									
									ob_start();
									print_now_and_next($ch_id);
									$now_and_next = ob_get_contents();
									ob_end_clean();
									
									$rtsp_url	=	"rtsp://ss" . $server_id . ".midpenmedia.org:1935/live-chans/ch" . $ch_id . "_all";
									$stream_url	=	'{ file: "http://ss '. $server_id . '.midpenmedia.org:1935/live-chans/ngrp:ch' . $ch_id . '_all/jwplayer.smil" },
									{ file: "http://ss' . $server_id . '.midpenmedia.org:1935/live-chans/ngrp:ch' . $ch_id . '_all/playlist.m3u8" }' ;
									
									if (array_key_exists('url', $ch)) {
										$now_and_next = '';
										$rtsp_url	=	$ch["url"];
										$stream_url	=	"{ file: '" . $ch["url"] . "' }" ;
									}
									
									
									$output_string	.=	'<li id="pane' . $pane_id . '" class="tab-pane ' . $is_active . '">
										<div class="video-con" id="my-video' . $ch_id . '"></div>
										<script type="text/javascript">
										if( isMobile.Android() ) {
											jQuery("#my-video' . $ch_id . '").html(\'<a href="' . $rtsp_url . '">' . $ch_title . '</a>\');
										} else {
											jwplayer("my-video' . $ch_id . '").setup({
												playlist: [{
													sources : [
														' . $stream_url . '
													],
													// title: "Channel ' . $ch_id . '",
													image: "' .  get_template_directory_uri() . '/images/tv-img.png"
												 }],
												primary: "flash",
												width: "505",
												height: "265"
											});
										}
										</script>
										<p class="video-details">' . $now_and_next . '</p>
									</li>
									';
									$pane_id++;
								endforeach;
								
								echo $output_string;
								
								?>
								
							</ul><!-- /.tab-content -->
							
						</div></div>
                    <div id="whats-on">						<div class="tab-head">What's On Now</div>
                    <ul class="nav nav-tabs verticalslider_tabs">
								<li class="active"><a href="#pane1" ss-no="1" channel="26" id="channel-26" data-toggle="tab">Government etc
									<br />Channel 26</a>
									<div class="arrow"></div>
								</li>
								<li><a href="#pane2" ss-no="2" channel="27" id="channel-27" data-toggle="tab">Bay Voice TV Regional Programming
									<br />Channel 27</a>
									<div class="arrow"></div>
								</li>
								<li><a href="#pane3" ss-no="2" channel="28" id="channel-28" data-toggle="tab">Youth, Education and Sports
									<br />Channel 28</a>
									<div class="arrow"></div>
								</li>
								<li><a href="#pane4" ss-no="1" channel="29" id="channel-29" data-toggle="tab">Government etc
									<br />Channel 29</a>
									<div class="arrow"></div>
								</li>
								<li><a href="#pane5" ss-no="2" channel="30" id="channel-30" data-toggle="tab">Arts, Issues and Lifestyles
									<br />Channel 30</a>
									<div class="arrow"></div>
								</li>
								<li><a href="#pane6" ss-no="2" channel="75" id="channel-75" data-toggle="tab">Diversity and Culture
									<br />Channel 75</a>
									<div class="arrow"></div>
								</li>
							</ul>
		    </div>
                    <div class="clear"></div>
                    <span class="video-option"><p>Is your monthly data usage limited? Select the maximum data rate for playing this video</p> 
									<label class="radio-inline">
										<input type="radio" name="bitrates" id="inlineRadio1" value="all" checked="checked"> 2700 <span>kbps (MAX)</span>
									</label>
									<label class="radio-inline">
										<input type="radio" name="bitrates" id="inlineRadio2" value="max4"> 1500 <span>kbps</span>
									</label>
									<label class="radio-inline">
										<input type="radio" name="bitrates" id="inlineRadio3" value="max3"> 1000 <span>kbps</span>
									</label>
									<label class="radio-inline">
										<input type="radio" name="bitrates" id="inlineRadio5" value="max2"> 500 <span>kbps</span>
									</label>
									<label class="radio-inline">
										<input type="radio" name="bitrates" id="inlineRadio6" value="max1"> 300 <span>kbps (MIN)</span>
									</label>

							</span>
					</div>
				 
				</div>
				<!-- program schedule ends here -->
				<?php //comments_template( '', true ); ?>
				
			<?php endwhile; // end of the loop. ?>
			<div class="watch-now-page-link"><a href="/local-tv/local-tv-schedule/">I want to see the full schedule with program descriptions. Take me to the schedule.</a></div>
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
						// title: "Channel ' + channel + '"
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
							{ file: 'http://ss' + ss_no + '.midpenmedia.org:1935/live-chans/ngrp:ch' + channel + '_' + bit_rate + '/jwplayer.smil' },
							{ file: 'http://ss' + ss_no + '.midpenmedia.org:1935/live-chans/ngrp:ch' + channel + '_' + bit_rate + '/playlist.m3u8' }
						],
						title: "Channel ' + channel + '"
						// image: '<?php echo get_template_directory_uri(); ?>/images/tv-img.png'
					 }],
					primary: "flash",
					width: '505',
					height: '265'
				});
		
				jwplayer('my-video' + channel).load([
						{ file: 'http://ss' + ss_no + '.midpenmedia.org:1935/live-chans/ngrp:ch' + channel + '_' + bit_rate + '/jwplayer.smil' },
						{ file: 'http://ss' + ss_no + '.midpenmedia.org:1935/live-chans/ngrp:ch' + channel + '_' + bit_rate + '/playlist.m3u8' }
				]);
				jwplayer('my-video' + channel).play();
			}
			

		});
	
		jQuery(' .video-option input:radio').on("click", function() {
			bit_rate = jQuery(this).val();
			// alert(channel);
			// alert(bit_rate);
			var bitrate	=	'source';
			if(bit_rate	==	'all') bitrate	==	'source';
			else bitrate	=	bit_rate.replace(/[^0-9\.]/g, '');
			if( isMobile.Android() ) {
				jQuery('#my-video' + channel).html('<a href="rtsp://ss' + ss_no + '.midpenmedia.org:1935/live-chans/ch' + channel + '_' + bitrate + '">Arts, Issues &amp; Entertainment</a>');
			} else {
				jwplayer('my-video' + channel).load([
					{ file: 'http://ss' + ss_no + '.midpenmedia.org:1935/live-chans/ngrp:ch' + channel + '_' + bit_rate + '/jwplayer.smil' },
					{ file: 'http://ss' + ss_no + '.midpenmedia.org:1935/live-chans/ngrp:ch' + channel + '_' + bit_rate + '/playlist.m3u8' }
				]);
				jwplayer('my-video' + channel).play();
			}

		});
	});
	
    </script>
<?php
// }

get_footer(); 

?>