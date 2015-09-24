<?php
/*
 Template Name: Full Width Test Page
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all t-all d-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header promo-header cf">

									<?php

									$post_object = get_field('attach_promo');
								
									if( $post_object ): 
									
										// override $post
										$post = $post_object;
										setup_postdata( $post ); 
									
										?>

										<?php $image = get_field('promo_image'); ?>

										<div class="promo-image cf">

											<img src="<?php echo $image['url']; ?>"  />
									
										</div>

										<div class="promo-info">


											<h2><?php the_field('catalog_number', false, false); ?> <?php the_field('artist', false, false); ?> - <?php the_field('promo_title', false, false); ?></h2>
											<p><?php the_field('promo_description', false, false); ?></p>
											<p class="promo-meta">Release Date: <?php the_field('release_date'); ?></p>

										</div>


								</header>

								<section class="entry-content cf" itemprop="articleBody">

								<div class="promo-player">
									
								
									
									    <?php $player = get_field('promo_player'); ?>

										<?php echo do_shortcode($player); ?>

									    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
									<?php endif; ?>
								</div>
								
									<?php
										// the content (pretty self explanatory huh)
										the_content();
									?>
								</section>


								<footer class="article-footer">

								<div id="wave" style="display: block;">
                <div id="track-progress">
                    <div class="tracker"></div>
                    <div class="progress-bar" style="width: 6px;"></div>
                </div>
            <wave style="display: block; position: relative; -webkit-user-select: none; height: 128px; overflow-x: auto; overflow-y: hidden;"><canvas style="position: absolute; z-index: 1; width: 985px;" width="1970" height="256"></canvas><wave style="position: absolute; z-index: 2; overflow: hidden; width: 10px; box-sizing: border-box; border-right-style: solid; border-right-width: 2px; border-right-color: rgb(0, 0, 0);"><canvas width="1970" height="256" style="width: 985px;"></canvas></wave></wave><audio preload="auto" src="https://s3.amazonaws.com/vizual/audio/VIZ001-01_128.mp3"></audio></div>

								<div class="player-controlbuttons">
    <div class="layout-helper">
        <button class="player-control-button" id="wavecontrol-previous">previous</button>
        <!-- <button class="player-control-button" id="wavecontrol-pauseplaytoggle">pause/play</button> -->
        <button class="player-control-button wavecontrol-play" id="" style="display: block;">play</button>
        <button class="player-control-button wavecontrol-pause" id="" style="display: none;">pause</button>
        <button class="player-control-button" id="wavecontrol-forward">forward</button>
        <button class="player-control-button notext icon-mutecircle volume-on" id="wavecontrol-mutetoggle">
            <span class="text">mute</span>
        </button>
        <div class="player-volumeslider">
            <div id="slider" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><div class="ui-slider-range ui-widget-header ui-corner-all ui-slider-range-min" style="width: 80%;"></div><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 80%;"></span></div>
        </div>
        <!-- END player-volumeslider -->
        <div class="player-trackactions" style="display: block;">
                <!--<button class="tl-action icon-star-empty notext">
                    <span class="text">favourite</span>
                </button>-->
                <button class="tl-action icon-plus-circled notext">
                    <span class="text">add to</span>
                </button>
                <button class="tl-action icon-download-cloud notext">
                    <span class="text">download</span>
                </button>
        </div>
    </div>
        <!-- END layout-helper -->
</div>

<div class="player-playinginfo">
                    <span>Now Playing <strong>Lightstream</strong> <span class="track-progress">01:05</span></span>
                    <span id="loading" style="display: none;">Now Playing <strong>Lightstream</strong> <span class="track-progress">01:05</span></span>
                </div>

                <ul class="tracklist">
                    <li><a class="tl-action track-button icon-play-circled" href="https://s3.amazonaws.com/vizual/audio/VIZ001-01_128.mp3" data-track-id="https://s3.amazonaws.com/vizual/audio/VIZ001-01_128.mp3">
                                            <span id="track1" class="icon-play3"></span>
                                            Brainhouse
                                            <span class="badge">0:21</span>
                                        </a></li>

                    <li><a class="tl-action track-button icon-play-circled" href="https://s3.amazonaws.com/vizual/audio/VIZ001-02_128.mp3" data-track-id="https://s3.amazonaws.com/vizual/audio/VIZ001-02_128.mp3">
                                             <span id="track2" class="icon-play3"></span>
                                            Jackdub
                                            <span class="badge">1:04</span>
                                        </a></li>

                    <li><a class="tl-action track-button icon-play-circled" href="https://s3.amazonaws.com/vizual/audio/VIZ001-03_128.mp3" data-track-id="https://s3.amazonaws.com/vizual/audio/VIZ001-03_128.mp3">
                                             <span id="track3" class="icon-play3"></span>
                                            Blazthole
                                            <span class="badge badge-info">1:26</span>
                                        </a></li>
                                        </ul>

								</footer>

								

							</article>

							<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry cf">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the page-custom.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</main>

				

				</div>

			</div>


<?php get_footer(); ?>

<script>
jQuery(document).ready(function($){
	var $list   = $('.ul-mjp');
     var $select = $('.gfield_select');

$list.children('li').each(function(index) {
  $('<option />').attr('value', index + ' - ' + $(this).text()).html($(this).text()).appendTo($select);
  $($select).show();
});
$('#field_2_3').insertAfter('#field_2_8');
});

jQuery(document).ready(function($){
 
 // console.log($formID);
	$('.gform_button').click(function (e) {
    e.preventDefault();
    //start your AJAX validation
    checkAndSubmit();
});
	
	function checkAndSubmit() {

	var $formID = $('.gform_wrapper > form').attr('id');
	// console.log($formID);
    var review = $('.promo-review').find( 'textarea').first().val();
    var rating = $('input[name="score"]').val();
    var favorite = $('.promo-drop-down').find('select').first().val();
  
  
    if (!review ) {
        console.log('nope');
        // doesn't work with variable for some reason
        $('.promo-review').find( 'textarea').first().css('border', '2px solid red');
        $('.promo-review').qtip({
    		content: {
        		text: 'Please enter a review.'
    		},
    		show: {
    			ready: true,
    		    
    		},
    		position: {
    		    my: 'left bottom',  // Position my top left...
    		    at: 'left center', // at the bottom right of...
    		    target: $('.promo-review') // my target
    		},
    		hide: {
    		    event: 'click unfocus'
    		},
    		style: {
    		    classes: 'qtip-red qtip-shadow'
    		}
    
		});
    }
    if (!rating ) {
        console.log('no rating');
        // doesn't work with variable for some reason
        $('.promo-rating .rating').css('border', '2px solid red');
        $('.promo-rating .rating').qtip({
    		content: {
        		text: 'Please rate this release.'
    		},
    		position: {
    		    my: 'top left',
    		    at: 'left bottom',
    		    target: $('.promo-rating .rating')
    		    
    		},
    		show: {
    			ready: true,
    		    
    		},
    		hide: {
    		    event: 'click unfocus'
    		},
    		style: {
    		    classes: 'qtip-red qtip-shadow'
    		}
    
		});
    }
    if (!favorite ) {
        console.log('no favorite');
        // doesn't work with variable for some reason
        $('.promo-drop-down').find('select').first().css('border', '2px solid red');
        $('.promo-drop-down').find('select').first().qtip({
    		content: {
        		text: 'Please choose a favorite track.'
    		},
    		show: {
    			ready: true,
    		    
    		},
    		position: {
    		    my: 'left bottom',  // Position my top left...
    		    at: 'left center', // at the bottom right of...
    		    target: $('.promo-drop-down').find('select').first() // my target
    		},
    		hide: {
    		    event: 'click unfocus'
    		},
    		style: {
    		    classes: 'qtip-red qtip-shadow'
    		}
    
		});
    }
    else {

            $.post($(this).attr('action'), $(this).serialize(), function(response){
            	console.log('submitted');
            	$(".promo-download, .dloadmp3-MI").show();
            	$('.promo-download').css('width', 'auto');
            	$('.gform_wrapper > form :input').prop("disabled", true);
            	$('.promo-review').find( 'textarea').first().css('border', '0');
            	$('.promo-rating .rating').css('border', '0');
            	$('.promo-drop-down').find('select').first().css('border', '0');
            	$('.qtip').qtip('disable');
            });
       
    	}
	}

});

//README https://github.com/katspaugh/wavesurfer.js/blob/master/README.md
// option               type    default description
// audioContext             string  null    Use your own previously initialized AudioContext or leave blank.
// audioRate            float   1   Speed at which to play audio. Lower number is slower.
// backend              string  WebAudioBuffer  One of WebAudioBuffer, WebAudioMedia or AudioElement. In most cases you needn't set this manually.
// container            mixed   none    CSS-selector or HTML-element where the waveform should be drawn. This is the only required parameter
// color // cursorColor             string  #333    The fill color of the cursor indicating the playhead position.
// cursorWidth              integer 1   Measured in pixels.
// dragSelection            boolean true    Enable/disable drag selection.
// fillParent               boolean true    Whether to fill the entire container or draw only according to minPxPerSec.
// height               integer 128 The height of the waveform. Measured in pixels.
// hideScrollbar            boolean false   Whether to hide the horizontal scrollbar when one would normally be shown.
// interact             boolean true    Whether the mouse interaction will enabled at initialization.
// loopSelection            boolean true    Whether playback should loop inside the selected region. Has no effect if dragSelection is false.
// markerWidth              integer 1   Measured in pixels.
// minPxPerSec              integer 50  Minimum number of pixels per second of audio.
// normalize            boolean false   If true, normalize by the maximum peak instead of 1.0.
// pixelRatio               integer window.devicePixelRatio Can set to 1 for faster rendering.
// color // progressColor               string  #555    The fill color of the part of the waveform behind the cursor.
// scrollParent             boolean false   Whether to scroll the container with a lengthy waveform. Otherwise the waveform is shrinked to container width (see fillParent).
// selectionBorder              boolean false   Whether to display a border when dragSelection is true.
// color // selectionBorderColor            string  #000    Used when selectionBorder is true.
// color // selectionColor              string  #0fc    The fill color for a selected area when dragSelection is true.
// selectionForeground              boolean false   Whether the selection is displayed in the foreground.
// skipLength               float   2   Number of seconds to skip with the skipForward() and skipBackward() methods
// color // waveColor               string  #999    The fill color of the waveform after the cursor.
jQuery(document).ready(function($) {
    var wavesurfer = Object.create(WaveSurfer);
    var playpausetoggle = $("#wavecontrol-pauseplaytoggle");
    var mutetoggle = $("#wavecontrol-mutetoggle");
    var playbutton = $('.wavecontrol-play');
    var pausebutton = $('.wavecontrol-pause');
    var playerstatecontainercontainer = $('.music-player-container_stickyspacer');
    var playerstatecontainer = $('.music-player-container');
    var $wave = $('#wave');
    var $forwardbutton = $('#wavecontrol-forward');
    var $previousbutton = $('#wavecontrol-previous');
    var $track_listing = $('.track-listing');
    var $emptyplayer_content = $('.emptyplayer-content');
    var $player_controlbuttons = $('.player-controlbuttons');
    var $nowplaying = $('.player-playinginfo span');
    var $player_trackactions = $('.player-trackactions');
    var $loadingplayer_content = $('.loadingplayer-content');
    var tracks = [];
    $wave.hide();
    //$player_controlbuttons.hide(); 
    $emptyplayer_content.show();
    $player_trackactions.hide();
    $loadingplayer_content.hide();
    $('.track-button').each(function(index, obj) {
        if ($(this).prop('disabled') == false || typeof $(this).prop('disabled') ==
            'undefined') {
            data = $(this).data();
            //tracks[data.trackId] = data; 
            tracks.push(data);
        }
    });
    wavesurfer.init({
        container: '#wave',
        cursorColor: '#000',
        cursorWidth: 2,
        progressColor: '#007EFF',
        waveColor: '#555555',
        selectionBorder: false,
        selectionBorderColor: '#30aEFF',
        selectionForeground: true,
        markerWidth: 50,
        backend: 'MediaElement'
    });
    wavesurfer.setVolume(.8);
    /* LOOPING
    if (wavesurfer.enableDragSelection) {
        wavesurfer.enableDragSelection({
            color: 'rgba(113, 190, 255, 0.2)',
            loop: true,
            
        });
    }
    
    wavesurfer.on('region-created', function (region) {
          setTimeout(function () {
            region.play();
          }, 0);
        });*/
    wavesurfer.on('ready', function() {
        wavesurfer.play();
    });
    wavesurfer.on('finish', function() {
        playbutton.show();
        pausebutton.hide();
        $('.progress-bar').finish().css({
            width: 0
        });
        trackindex = $.getnowplayingtrackindex();
        trackid = tracks[trackindex].trackId;
        trackicon = $('.track-button[data-track-id="' + trackid + '"]');
        trackicon.removeClass('icon-pause-circled').addClass('icon-play-circled');
        trackicon.parents('tr').removeClass('is-playing');
        if (playerstatecontainer.attr('data-play-all') == 'true') {
            $.playnexttrack();
            return;
        }
        //wavesurfer.empty();
        $.setplayerstate('idle');
        //console.log('player event: finish');
    });
    wavesurfer.on('pause', function() {
        //trackindex      = $.getnowplayingtrackindex();
        //trackid         = tracks[trackindex].trackId;
        //trackicon       = $('[data-track-id="'+trackid+'"]');
        $('.track-button').removeClass('icon-pause-circled').addClass(
            'icon-play-circled');
        $('.track-button').parents('tr').removeClass('is-playing');
        $.setplayerstate('paused');
        weneedplaybutton();
            //console.log('player event: pause');
        durationinterval.pause();
    });
    wavesurfer.on('loading', function(progress) {
        var $loading = $('#loading', '.music-player-container');
        // show loading screen here instead
        if (progress >= 99) {
            $wave.show();
            $loading.hide().html('');
        } else {
            $loading.html('(Loading&hellip;' + progress + '%)');
        }
    });
    wavesurfer.on('play', function() {
        playbutton.hide();
        pausebutton.show();
        //console.log(playerstatecontainer.attr('data-vol'));
        wavesurfer.setVolume(playerstatecontainer.attr('data-vol') || .8);
        $('.track-loader').remove();
        trackindex = $.getnowplayingtrackindex();
        trackid = tracks[trackindex].trackId;
        trackicon = $('.track-button[data-track-id="' + trackid + '"]');
        trackicon.removeClass('icon-play-circled').addClass('icon-pause-circled')
            .show();
        trackicon.parents('tr').addClass('is-playing');
        $('.track-button:hidden').show();
        $('.music-player-container').attr('data-now-playing-track-id', trackid);
        // open player if it's shut
        if (playerstatecontainer.hasClass('visible-false')) {
            // playerstatecontainer.toggleClass('visible-false visible-true');
            togglePlayer();
        }
        $.setplayerstate('playing');
        //console.log('player event: play');
        //console.log('now playing: ' + tracks[trackindex].trackTitle);
        nowplayingtitle = $.getnowplayingtitle();
        duration = $.formattrackduration(wavesurfer.getCurrentTime()) || $.formattrackduration(
            wavesurfer.getDuration());
        $nowplaying.html('Now Playing <strong>' + nowplayingtitle +
            '</strong> <span class="track-progress">' + duration + '</span>');
        $player_trackactions.show();
        if (typeof durationinterval != 'undefined') {
            clearInterval(durationinterval);
        }
        // start timer
        durationinterval = new durationInterval(function() {
            if (wavesurfer.getCurrentTime() < wavesurfer.getDuration()) {
                duration = $.formattrackduration(wavesurfer.getCurrentTime());
                $('.track-progress').html(duration);
                var prog = Math.round((wavesurfer.getCurrentTime() * 1000) /
                    wavesurfer.getDuration());
                $('.progress-bar').animate({
                    width: prog + 'px'
                }, 1000, 'linear');
            }
        }, 1000);
        var filename = $('.icon-pause-circled').attr('data-aws-key');
        var is_variation = $('.icon-pause-circled').parents('.left-actions').siblings(
            '.right-actions').attr('data-track-var');
        $.recordTrackPlay(filename, is_variation);
    });
    $('#track-progress').mousemove(function(e) {
        var offset = $(this).offset();
        var relX = e.pageX - offset.left;
        var relY = e.pageY - offset.top;
        $('.tracker').css({
            width: relX
        });
    });
    $('#track-progress').on('click', function(e) {
        //durationinterval.pause();
        $('.progress-bar').finish();
        var offset = $(this).offset();
        var relX = e.pageX - offset.left;
        var relY = e.pageY - offset.top;
        var duration = wavesurfer.getDuration();
        var seekTo = ((relX / 1000) * duration) / duration;
        wavesurfer.seekTo(seekTo);
        var prog = Math.round((wavesurfer.getCurrentTime() * 1000) / wavesurfer.getDuration());
        $('.progress-bar').css({
            width: prog + 'px'
        });
        //durationinterval.resume();
    });

    function durationInterval(callback, delay) {
        var timerID, start, remaining = delay;
        this.pause = function() {
            window.clearInterval(timerId);
            remaining -= wavesurfer.getCurrentTime() - start;
        };
        this.resume = function() {
            start = wavesurfer.getCurrentTime();
            if (typeof timerId != 'undefined') window.clearInterval(timerId);
            timerId = window.setInterval(callback, remaining);
        };
        this.resume();
    }

    function weneedpausebutton() {
        playbutton.hide();
        pausebutton.show();
    }

    function weneedplaybutton() {
        playbutton.show();
        pausebutton.hide();
    }

    function pauseplayer() {
        wavesurfer.pause();
        weneedplaybutton();
        $.setplayerstate('paused');
    }

    function togglemutebuttonstyle() {
        mutetoggle.toggleClass('volume-on volume-off');
    }

    function hidePlayer() {
        playerstatecontainercontainer.toggleClass('visible-false visible-true');
        playerstatecontainer.toggleClass('visible-false visible-true');
    }
    function togglePlayer() {
        playerstatecontainercontainer.toggleClass('visible-false visible-true');
        playerstatecontainer.toggleClass('visible-false visible-true');
    }


    pausebutton.on('click', function() {
        pauseplayer();
        $.setplayerstate('paused');
    });
    mutetoggle.on('click', function() {
        wavesurfer.toggleMute();
        togglemutebuttonstyle();
    });
    $(document).on('click', '.track-button', function(e) {
        e.preventDefault();
        //sessionStorage.removeItem('player-current-pos');
        //sessionStorage.removeItem('player-current-track-data');
        if ($(this).hasClass('icon-pause-circled')) {
            wavesurfer.pause();
            return;
        }
        //playerstatecontainer.attr('data-play-all', 'false');
        trackid = $(this).attr('data-track-id');
        $.playtrack(trackid);
    });
    playbutton.on('click', function() {
        if ($.getplayerstate() == 'idle') {
            var trackid = tracks[0].trackId;
            if (typeof trackid != 'undefined') {
                $.playtrack(trackid);
            }
        } else {
            wavesurfer.play();
        }
    });
    playervolumeslider = $('#slider');
    // $("#slider").slider({
    //     range: "min",
    //     max: 100,
    //     value: 80,
    //     slide: function(event, ui) {
    //         var slidernumber = ui.value - 1;
    //         var volume = slidernumber / 100;
    //         playerstatecontainer.attr('data-vol', volume);
    //         wavesurfer.setVolume(volume);
    //     }
    // });
    // -- Modals -- //
    $('.modal-window .close-it, .overlay').on('click', function() {
        $('.modal-window, .overlay').fadeOut('fast');
        return false;
    });
    $('body').keyup(function(e) {
        if (e.keyCode == 27) {
            $('.modal-window, .overlay').fadeOut('fast');
        }
    });
    $(document).on('click', '.icon-plus-circled', function() {
        var pl_track_id = $(this).parent().attr('data-track-id') || $(
            '.music-player-container').attr('data-now-playing-track-id');
        var is_variation = $(this).parent().attr('data-track-var') || 'false';
        if (typeof pl_track_id == 'undefined') {
            pl_track_id = $(this).parent().prev().find('.track-button').attr(
                'data-track-id') || $(this).parent().prev().find('a').attr(
                'data-track-id');
        }
        //console.log(pl_track_id);
        $('.modal-window#add-playlist, .overlay').attr('data-track-id',
            pl_track_id);
        $('.modal-window#add-playlist, .overlay').attr('data-track-var',
            is_variation);
        $('.modal-window#add-playlist, .overlay').find('.added-to-playlist').hide();
        $('.modal-window#add-playlist, .overlay').fadeIn('fast');
        return false;
    });
    $(document).on('click', '.download-all', function() {
        var album_name = $('.album-detail h1').clone().children().remove().end().text()
            .trim() || $('.track-detail h1').clone().children().remove().end().text()
            .trim();
        $('.modal-window#download-album, .overlay').find('.download-track-title')
            .html(album_name);
        $('.modal-window#download-album, .overlay').fadeIn('fast');
    });

    $(document).on('click', '.download-playlist', function(e) {
        e.preventDefault();
        var playlist_name = $(this).parent().parent().attr('data-playlist-name');
        $('.modal-window#download-album').attr('data-playlist-id', $(this).parent().parent().attr('data-playlist-id'));
        $('.modal-window#download-album, .overlay').find('.download-track-title')
            .html(playlist_name.toUpperCase());
        $('.modal-window#download-album, .overlay').fadeIn('fast');
    });

    $(document).on('click', '.modal-window#download-album .modal-download-mp3',
        function(e) {
            e.preventDefault();
            var playlist_id = $('.modal-window#download-album').attr('data-playlist-id');
            if ('' == playlist_id || typeof playlist_id == 'undefined') {
                $.downloadTracksObject('mp3');

            } else {

                $.downloadPlaylist(playlist_id, 'mp3');
            }


            $('.modal-window#download-album, .overlay').fadeOut('fast');
        });
    $(document).on('click', '.modal-window#download-album .modal-download-aif',
        function(e) {
            e.preventDefault();
            var playlist_id = $('.modal-window#download-album').attr('data-playlist-id');
            if ('' == playlist_id || typeof playlist_id == 'undefined') {
                $.downloadTracksObject('aif');

            } else {

                $.downloadPlaylist(playlist_id, 'aif');
            }
            $('.modal-window#download-album, .overlay').fadeOut('fast');
        });
    $(document).on('click', '.add-album-to-playlist', function(e) {
        e.preventDefault();
        var track_ids = [];
        $.each(tracks, function(i, obj) {
            track_ids.push(obj.trackId);
        });
        $('.modal-window#add-playlist').attr('data-track-id', track_ids);
        $('.modal-window#add-playlist, .overlay').fadeIn('fast');
        return false;
    });

    $('.open-media-player button').on('click', function() {
        // $('.music-player-container').toggleClass('visible-false visible-true');
        togglePlayer();
    });

    // need to update to use object instead of button data
    $(document).on('click', '.tl-action.icon-download-cloud', function(e) {
        if ($(e.target).closest('.download-playlist').length > 0) {
            return false;
        }

        var $trackData = $(this).parent().siblings('.left-actions').find(
            '.track-button');
        var is_variation = $(this).parents('.right-actions').attr(
            'data-track-var');
        if ($trackData.length == 0) {
            $trackData = $(this).parent().siblings('.track-button');
        }
        if ($trackData.length == 0) {
            nowplayingtrackindex = $.getnowplayingtrackindex();
            nowplayingtrackid = tracks[nowplayingtrackindex].trackId;
            $trackData = $('[data-track-id="' + nowplayingtrackid + '"]');
        }
        var hasAIF = $trackData.attr('data-aif');
        var hasMP3 = $trackData.attr('data-mp3');
        var mp3download = $('.modal-download-mp3', '.modal-window#download-files');
        var aifdownload = $('.modal-download-aif', '.modal-window#download-files');
        var $modal = $('.modal-window#download-files');
        if (hasAIF == 0) {
            aifdownload.hide();
        } else {
            aifdownload.show();
        }
        if (hasMP3 == 0) {
            mp3download.hide();
        } else {
            mp3download.show();
        }
        var trackTitle = $trackData.data('track-title');
        $('span.download-track-title', $modal).html(trackTitle);
        mp3download.attr('data-aws-key', $trackData.attr('data-aws-key'));
        aifdownload.attr('data-aws-key', $trackData.attr('data-aws-key'));
        mp3download.attr('download', $trackData.attr('data-aws-key') + '.mp3');
        aifdownload.attr('download', $trackData.attr('data-aws-key') + '.aif');
        mp3download.attr('href', 'audio/320/' + $trackData.attr('data-aws-key') +
            '.mp3');
        aifdownload.attr('href', 'audio/aif/' + $trackData.attr('data-aws-key') +
            '.aif');
        mp3download.attr('data-track-var', is_variation);
        aifdownload.attr('data-track-var', is_variation);
        $('.modal-window#download-files, .overlay').fadeIn('fast');
        return false;
    });
    $('.modal-download-mp3', '.modal-window#download-files').on('click',
        function(e) {
            //e.preventDefault();
            $(this).downloadTrack('mp3');
            $('.modal-window#download-files, .overlay').fadeOut('fast');
            //return true;
        });
    $('.modal-download-aif', '.modal-window#download-files').on('click',
        function(e) {
            //e.preventDefault();
            $(this).downloadTrack('aif');
            $('.modal-window#download-files, .overlay').fadeOut('fast');
            //return true;
        });
    $forwardbutton.on('click', function() {
        $.playnexttrack();
    });
    $previousbutton.on('click', function() {
        $.playprevioustrack();
    });
    $('.play-all').on('click', function(e) {
        e.preventDefault();
        if ($.getplayerstate() == 'idle') {
            var trackid = tracks[0].trackId;
            $.playtrack(trackid);
            //playerstatecontainer.attr('data-play-all', 'true');
        } else {
            wavesurfer.play();
        }
    });
    $.playtrack = function(trackid) {
        $('.track-loader').remove();
        $('.track-button:hidden').show();
        trackindex = $.gettrackindex(trackid);
        trackURL = tracks[trackindex].awsUrl;
        //console.log(trackindex);return;
        if ($.getplayerstate() == 'paused' && $.getnowplayingtrackindex() ==
            trackindex) {
            wavesurfer.play();
            return;
        }
        $('.progress-bar').finish().css({
            width: 0
        });
        trackbutton = $('.track-button[data-track-id="' + trackid + '"]');
        trackbutton.hide().after(
            '<img class="track-loader" src="./css/style-images/track-loader.gif">');
        $.setnowplayingtrackindex(trackindex); // use object instead?
        if (trackURL) {
            $('.emptyplayer-content, .loadingplayer-content').hide();
            $player_trackactions.hide();
            $wave.show();
            $nowplaying.html('');
            wavesurfer.empty(); // for some reason this empties trackindex ?
            wavesurfer.load('');
            wavesurfer.load(trackURL);
            $('#loading', '.music-player-container').show();
        } else {
            $.playnexttrack(); //needs to know which way the playlist is being played because the user might be clicking previous
        }
        $.setnowplayingtrackindex()
    };
    $.playprevioustrack = function() {
        var nowplayingtrackindex = $.getnowplayingtrackindex();
        var nexttrackid;
        //console.log(nowplayingtrackindex);
        if (typeof nowplayingtrackindex === 'undefined') {
            nexttrackid = tracks[0].trackId;
        } else {
            nexttrackindex = parseInt(nowplayingtrackindex) - 1;
            // if (nexttrackindex ==0) nexttrackindex = -1; // temporary fix for forward/prev
            if (typeof nexttrackindex === 'undefined' || nexttrackindex == -1) {
                nexttrackid = tracks[tracks.length - 1].trackId;
            } else {
                nexttrackid = tracks[nexttrackindex].trackId;
            }
        }
        $.playtrack(nexttrackid);
    };
    $.playnexttrack = function() {
        var nowplayingtrackindex = $.getnowplayingtrackindex();
        var nexttrackid;
        if (typeof nowplayingtrackindex === 'undefined') {
            nexttrackid = tracks[0].trackId;
        } else {
            nexttrackindex = parseInt(nowplayingtrackindex) + 1;
            if (nexttrackindex == 1) {
                if (tracks.length > 1 && tracks[0].trackId == tracks[1].trackId) {
                    nexttrackindex = 2;
                } else if (tracks.length <= 1) {
                    return
                }
            }
            if (nexttrackindex == 0) nexttrackindex = 1; // temporary fix for forward/prev
            if (typeof nexttrackindex === 'undefined' || nexttrackindex > tracks.length -
                1) {
                nexttrackid = tracks[0].trackId;
            } else {
                nexttrackid = tracks[nexttrackindex].trackId;
            }
        }
        $.playtrack(nexttrackid);
    };
    $.gettrackindex = function(trackid) {
        $(tracks).each(function(index, obj) {
            if (obj.trackId == trackid) {
                trackindex = index;
                return false;
            }
        });
        return trackindex;
    };
    $.setnowplayingtrackindex = function(trackid) {
        trackindex = $.gettrackindex(trackid);
        playerstatecontainer.attr('data-now-playing-index', trackindex);
    }
    $.getnowplayingtrackindex = function() {
        return playerstatecontainer.attr('data-now-playing-index');
    };
    $.fn.downloadTrack = function(type) {
        var aws_key = $(this).attr('data-aws-key');
        var is_variation = $(this).attr('data-track-var');
        var ajaxdownloadtrackurl = $('input[name="ajax-download-track-url"]').val();
        $.ajax({
            url: ajaxdownloadtrackurl,
            type: 'POST',
            data: {
                aws_key: aws_key,
                type: type,
                is_variation: is_variation
            },
            cache: false,
            dataType: 'json',
        }).done(function(data) {
            if (data.response == 'OK') {
                //console.log(data);
                //console.log('file downloaded and download counted');
                //window.location = data.awsURLs[0];
            } else {
                console.log('could not download object');
                console.log(data.errorMessage);
            }
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        });
    }
    $.recordTrackPlay = function(filename, is_variation) {
        var ajaxrecordtrackplayurl = $('input[name="ajax-record-track-play"]').val();
        $.ajax({
            url: ajaxrecordtrackplayurl,
            type: 'POST',
            data: {
                filename: filename,
                is_variation: is_variation
            },
            cache: false,
            dataType: 'json',
        }).done(function(data) {
            if (data.response == 'OK') {} else {
                //console.log(data.errorMessage);
            }
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        });
    }

    $.downloadPlaylist = function(playlist_id, type) {
        type = typeof type !== 'undefined' ? type : 'mp3';

        var ajaxdownloadplaylisturl = $('input[name="ajax-download-playlist-url"]').val();

        $.ajax({

            url: ajaxdownloadplaylisturl,
            type: 'POST',
            data: {
                playlist_id: playlist_id,
                type: type,
            },
            cache: false,
            dataType: 'json',
        }).done(function(data) {
            if (data.response == 'OK' && data.downloadZip) {
                window.location = data.downloadZip;
            } else if (data.response == 'login') {
                alert('Please login or register to download tracks')
            } else {
                console.log('could not download object');
                console.log(data.errorMessage);
            }
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        });

    }

    $(document).on('click', '.delete-playlist', function(e) {
        e.preventDefault();

            var redirect=false;
        if ($(this).hasClass('delete-redirect'))
            {
            redirect = true;
            }

        var confirmDelete = confirm('Are you sure you want to delete this playlist?');

        if (!confirmDelete) {
            return false;
        }

        var playlist_id = $(this).parent().parent().attr('data-playlist-id');

        var ajaxdeleteuserplaylisturl = $('input[name="ajax-delete-user-playlist-url"]').val();
 
        if (typeof playlist_id == 'undefined' || '' == playlist_id) {

            return false;
        }

        var el = this;

        $.ajax({

            url: ajaxdeleteuserplaylisturl,
            type: 'POST',
            data: {
                playlist_id: playlist_id,
            },
            cache: false,
            dataType: 'json',
        }).done(function(data) {
            if (data.response == 1) {
                
                if ( redirect )
                    {
                    window.location = $('.my-playlists-url').attr('href');
                    } else {
                         $('[data-playlist-id="' + playlist_id + '"]').css('background', '#FF0000').fadeOut('slow',
                                    function() {
                                        $(this).remove();
                                        $('.track-detail h1').html('My Playlists (' + $('.my-playlists tr').length + ')');
                                    });
                    }
                
               


            } else if (data.response == 'login') {
                alert('Please login or register to download tracks')
            } else {
                console.log('could not delete playlist');
                console.log(data);
            }
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        });

    });

    $.downloadTracksObject = function(type) {
            type = typeof type !== 'undefined' ? type : 'mp3';
            var track_keys = [];
            $.each(tracks, function(index, obj) {
                track_keys.push(obj.awsKey);
            });
            //console.log(track_keys);
            var ajaxdownloadtrackurl = $('input[name="ajax-download-track-url"]').val();
            var album_name = $('.album-detail h1').clone().children().remove().end().text()
                .trim() || $('.track-detail h1').clone().children().remove().end().text()
                .trim();
            $.ajax({
                //url: '/dev/felt-music/library/tracks/track/download',
                url: ajaxdownloadtrackurl,
                type: 'POST',
                data: {
                    track_keys: track_keys,
                    type: type,
                    multiple: true,
                    album_name: album_name
                },
                cache: false,
                dataType: 'json',
            }).done(function(data) {
                if (data.response == 'OK' && data.downloadZip) {
                    /*
                    if (confirm('Are you sure you want to download all ' + data.awsURLs.length + ' tracks?')){
                    $.each(data.awsURLs, function(index,url){ 
                        var iframe = document.createElement('iframe');
                        iframe.id = 'download-' + index;
                        iframe.src = url;
                        iframe.style.display = "none";
                    document.body.appendChild(iframe);
                    //iframe.parentNode.removeChild(iframe);
                        //console.log(url);
                    });
                    }*/
                    //console.log(data);
                    window.location = data.downloadZip;
                } else if (data.response == 'login') {
                    alert('Please login or register to download tracks')
                } else {
                    console.log('could not download object');
                    console.log(data.errorMessage);
                }
            }).fail(function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            });
        }
        /*
    $('.download-all').on('click',function(e){
        e.preventDefault();
        $.downloadTracksObject();
        //return true;
    });*/
    $.getplayerstate = function() {
        return playerstatecontainer.attr('data-state');
    };
    $.setplayerstate = function(state) {
        playerstatecontainer.attr('data-state', state);
    };
    $.updateTracksObject = function() {
        $track_listing = $('.track-listing');
        tracks = [];
        $('.track-button', $track_listing).each(function(index, obj) {
            data = $(this).data();
            //tracks[data.trackId] = data; 
            tracks.push(data);
        });
        //console.log('tracks object updated');
    };
    $.getnowplayingtitle = function() {
        nowplayingindex = $.getnowplayingtrackindex();
        title = tracks[nowplayingindex].trackTitle;
        return title;
    };
    $.formattrackduration = function(tracklength) {
        var totalSec = new Date(tracklength); //) / 1000;
        var hours = parseInt(totalSec / 3600) % 24;
        var minutes = parseInt(totalSec / 60) % 60;
        var seconds = totalSec % 60;
        var result = (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds <
            10 ? "0" + seconds : seconds);
        return result;
    };
    $(window).on('keydown', function(e) {
        if (e.keyCode == 32) {
            var tag = e.target.tagName.toLowerCase();
            if (e.which === 32 && tag != 'input' && tag != 'textarea') {
                e.preventDefault();
                if (typeof $.getnowplayingtrackindex() == 'undefined') {
                    $.playnexttrack();
                } else {
                    pausebutton.hide();
                    playbutton.show();
                    wavesurfer.playPause();
                }
            }
        }
    });
    
    $('.favourite-track').on('click', function(){
        
        var self = $(this);
        var track_id = $(this).parent().attr('data-track-id');
        
        if (self.hasClass('icon-star-empty')){
             var ajaxaddtrackurl = $('input[name="ajax-add-to-playlist-url"]').val();
            
            $.ajax({
                url: ajaxaddtrackurl,
                type: 'POST',
                data: {
                    track_ids: [track_id],
                    favourites: true
                },
                cache: false,
                dataType: 'json', 
            }).done(function(data) {
                if (data.response == 'OK'){
                    //console.log('added');
                    $('.right-actions[data-track-id="'+track_id+'"] .favourite-track').removeClass('icon-star-empty').addClass('icon-star');
                    //window.location = data.awsURL;
                } else if(data.response == 'login') {
                    alert('Please login or register to add tracks to your favourites')
                } else {
                    //console.log('could not download object');
                    //console.log(data.errorMessage);
                }
            }).fail(function(jqXHR, textStatus, errorThrown) {
                //console.log(jqXHR);
                //console.log(textStatus);
                //console.log(errorThrown);
            }); 
        } else {
    
             //var ajaxaddtrackurl = $('input[name="ajax-download-track-url"]').val();
            var ajaxremovetrackurl = $('input[name="ajax-remove-from-playlist-url"]').val();
            
            $.ajax({
                //url: '/dev/felt-music/library/tracks/track/download',
                url: ajaxremovetrackurl,
                type: 'POST',
                data: {
                    track_ids: [track_id],
                    favourites: true
                },
                cache: false,
                dataType: 'json', 
            }).done(function(data) {
                if (data.response == 'OK'){
                    console.log('removed');
                    $('.right-actions[data-track-id="'+track_id+'"] .favourite-track').toggleClass('icon-star icon-star-empty');
                    //window.location = data.awsURL;
                } else if(data.response == 'login') {
                    alert('Please login or register to add tracks to your favourites')
                } else {
                    console.log('could not delete object');
                    console.log(data.errorMessage);
                }
            }).fail(function(jqXHR, textStatus, errorThrown) {

                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }); 
        }

    });
 
    /*$('.icon-star-empty').click(function() {
        $(this).toggleClass('icon-star-empty icon-star');
        return false;
    });*/

    $(document).on('click', '.add-to-playlist', function(e) {
        e.preventDefault();
        var playlist_id = $(this).attr('data-playlist-id');
        var track_id = $(this).parents('#add-playlist').attr('data-track-id');
        var is_variation = $(this).parents('#add-playlist').attr('data-track-var');
        var track_ids = track_id.split(',');

        var added = $.addTracksToPlaylist(track_ids, playlist_id, false, this,
            is_variation);


    });
    $(document).on('click', '.new-playlist', function(e) {
        e.preventDefault();
        var track_id = $(this).parents('#add-playlist').attr('data-track-id');
        var track_ids = track_id.split(',');
        var is_variation = $(this).parents('#add-playlist').attr('data-track-var');
        $.addTracksToPlaylist(track_ids, null, true, null, is_variation)
    });
    $.addTracksToPlaylist = function(track_ids, playlist_id, new_playlist, el,
        is_variation) {

        var ajaxaddtrackurl = $('input[name="ajax-add-to-playlist-url"]').val();
        var track_ids, playlist_id, new_playlist, playlist_description = '',
            playlist_name = '';
        if (new_playlist) {
            playlist_name = prompt('Enter the name of your new playlist');
            if (playlist_name == null || playlist_name == '') {
                return;
            } else {
                playlist_description = prompt(
                    'Enter a description for this playlist (optional)');
            }
        }
        $.ajax({
            //url: '/dev/felt-music/library/tracks/track/download',
            url: ajaxaddtrackurl,
            type: 'POST',
            data: {
                track_ids: track_ids,
                playlist_id: playlist_id,
                playlist_name: playlist_name,
                playlist_description: playlist_description,
                is_variation: is_variation
            },
            cache: false,
            dataType: 'json',
        }).done(function(data) { //console.log(data); 
            if (data.response == 'OK') {
                //location.reload();
                if (data.new_playlist_added) {
                    var playlist_li = $('.playlist-interactions li:nth-child(2)');
                    playlist_li_new = playlist_li.clone();
                    playlist_li_new.find('.heading').html(playlist_name);
                    playlist_li_new.find('.add-to-playlist').attr('data-playlist-id',
                            data.new_playlist_id) //.removeClass('add-to-playlist, green')
                        //.css('background', '#E6E6E6').html('added');*/
                    playlist_li.before(playlist_li_new);
                    $('.filter-myplaylists ul').prepend('<li><a href="' + data.new_playlist_url +
                        '">' + playlist_name + '</a></li>');
                } else {
                    $(el).after(
                        '<span class="call-to-action added-to-playlist">Added</span>');
                }
                $('.modal-window#add-playlist, .overlay').fadeOut('fast');
                $('.right-actions[data-track-id="'+track_id+'"] .favourite-track').toggleClass('icon-star-empty icon-star');
                //window.location = data.awsURL;
            } else if (data.response == 'login') {
                alert('Please login or register')
            } else {
                console.log('could not download object');
                console.log(data.errorMessage);
            }
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        });
    }
    $(document).on('click', '.tl-action.icon-minus-circled', function() {
        var track_id = $(this).parent().attr('data-track-id');
        var playlist_id = $('.track-detail').attr('data-playlist-id');
        $.removeTrackFromPlaylist(track_id, playlist_id, this);
    });
    $.removeTrackFromPlaylist = function(track_id, playlist_id, el) {
        var track_id, playlist_id, el;
        if (track_id == '' || playlist_id == "") return;
        var ajaxremovetrackurl = $('input[name="ajax-remove-from-playlist-url"]').val();
        $.ajax({
            //url: '/dev/felt-music/library/tracks/track/download',
            url: ajaxremovetrackurl,
            type: 'POST',
            data: {
                track_ids: [track_id],
                playlist_id: playlist_id
            },
            cache: false,
            dataType: 'json',
        }).done(function(data) {
            if (data.response == 'OK') {
                //console.log('removed');
                $(el).parents('tr').css('background', '#FF0000').fadeOut('slow',
                    function() {
                        $(this).remove();
                    });
                $('.right-actions[data-track-id="'+track_id+'"] .favourite-track').toggleClass('icon-star icon-star-empty');
                //window.location = data.awsURL;
            } else if (data.response == 'login') {
                alert('Please login or register')
            } else {
                console.log('could not delete object');
                console.log(data.errorMessage);
            }
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        });
    }
    $(window).on('beforeunload', function() {
        // get current track info for player
        // get current position to start the player again
        trackindex = $.getnowplayingtrackindex();
        sessionStorage.removeItem('player-current-pos');
        sessionStorage.removeItem('player-current-track-data');
        if (typeof trackindex != 'undefined') {
            track = tracks[trackindex];
            if (typeof trackid != 'undefined') {
                sessionStorage.setItem('player-current-pos', wavesurfer.getCurrentTime());
                sessionStorage.setItem('player-current-track-data', JSON.stringify(
                    track));
            }
        }
    });
    $.continuePlaying = function() {
            var wasPlayingPos = sessionStorage.getItem('player-current-pos');
            var wasPlayingTrack = sessionStorage.getItem('player-current-track-data');
            if (null !== wasPlayingPos && null !== wasPlayingTrack) {
                var trackObj = JSON.parse(wasPlayingTrack);
                var prevId = trackObj.trackId;
                var tracksObjNext = tracks.length + 1;
                tracks.tracksObjNext = trackObj;
                $.playtrack($.gettrackindex(prevId));
            } else {
                console.log('nothing was previously playing');
            }
        }
        //$.continuePlaying();
    
    $(document).on('click', '.edit-playlist', function(e){
        e.preventDefault();
        var current_name            = $(this).parents('tr').attr('data-playlist-name') || $(this).parents('.track-detail').attr('data-playlist-name');
        var current_description     = $(this).parents('tr').find('.playlist-description p').html() || $('.playlist-description').html(); 
        var new_name                = prompt('Please enter a new name for this playlist', current_name);
        var new_description         = prompt('Please enter a new description for this playlist', current_description);
        var playlist_id             = $(this).parents('tr').attr('data-playlist-id') || $(this).parents('.track-detail').attr('data-playlist-id');
        
        if ( !new_name )
        {
            return false;
        }
        
        var ajaxupdateuserplaylistdetails = $('input[name="ajax-edit-user-playlist-url"]').val();
        
        $.ajax({
            url: ajaxupdateuserplaylistdetails,
            type: 'POST',
            data: {
                playlist_id: playlist_id,
                new_name: new_name,
                new_description: new_description
            },
            cache: false,
            dataType: 'json',
        }).done(function(data) {
            if (data.response == 'OK' && data.playlist_url) {
                
                if ( $('.my-playlists').length == 0 )
                {
                window.location = data.playlist_url;
                }
                
                $('[data-playlist-id="'+playlist_id+'"]').attr('data-playlist-name', new_name).find('span.playlist-title').html(new_name);
                $('[data-playlist-id="'+playlist_id+'"]').find('td.playlist-description p').html(new_description);
                
                $('[data-playlist-id="'+playlist_id+'"]').attr('data-playlist-name', new_name).find('td.playlist-title a').attr('href', data.playlist_url);
          

            } else if (data.response == 'login') {
                alert('Please login or register');
            } else {
                console.log('could not update object');
                console.log(data.errorMessage);
            }
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        });
        
    });
    
    
    $(document).on('change', 'select.my-playlists-sorting', function(){
        window.location = window.location.origin + window.location.pathname + window.location.hash + '?sort=' + $(this).val();
    });



});

</script>
