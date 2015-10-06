<?php
/*
 Template Name: Promo Demo Page
*/
?>

<?php get_header(); ?>

    <div id="content">

        <div id="inner-content" class="wrap cf">
            
        <main id="main" class="m-all t-all d-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

                    <section class="entry-content cf" itemprop="articleBody">

                        <header class="article-header promo-header cf">

                        <?php /* Grab promo attached to Page */ ?>

                            <?php $post_object = get_field('attach_promo');
                                
                            if( $post_object ): 
                                    
                            // override $post
                            $post = $post_object;
                            setup_postdata( $post ); ?>

                            <?php $image = get_field('promo_image'); ?>

                                <div class="promo-image cf">

                                    <img src="<?php echo $image['url']; ?>"  />
                                    
                                </div>

                                <div class="promo-info">

                                    <h2><span class="cat-number"><?php the_field('catalog_number', false, false); ?></span> <span class="promo-artist"><?php the_field('artist', false, false); ?></span> <span class="promo-title"><?php the_field('promo_title', false, false); ?></h2>

                                    <div class="promo-description"><?php the_field('promo_description', false, false); ?></div>
                                            
                                    <p class="promo-producers">

                                    <?php // check if the repeater field has rows of data
                                    if( have_rows('producers') ):
                                                
                                    // loop through the rows of data
                                    while ( have_rows('producers') ) : the_row();

                                    $producer = get_sub_field('producer'); ?>

                                    <?php if( $producer ): ?>
                                                
                                        <span class="producer">Produced by:
                                                       
                                            <?php echo $producer; ?>
                                                
                                        </span>

                                    <?php endif; ?>
                                                
                                    <?php endwhile;
                                                
                                    else :
                                                
                                    // no rows found
                                                
                                    endif; ?>
                                    
                                    <?php

                                    // check if the repeater field has rows of data
                                    if( have_rows('remixers') ):
                                                    
                                    // loop through the rows of data
                                    while ( have_rows('remixers') ) : the_row(); 

                                    $remixer = get_sub_field('remixer'); ?>

                                    <?php if( $remixer ): ?>
                                                
                                        <span class="remixer">Produced by:
                                                       
                                            <?php echo $remixer; ?>
                                                
                                        </span>

                                    <?php endif; ?>

                                    <?php endwhile;
                                                    
                                    else :
                                                    
                                    // no rows found
                                                    
                                    endif;
                                                    
                                    ?>
                                    
                                    <p class="promo-meta">Released by: Vizual Records | Release Date: <?php the_field('release_date'); ?></p>

                                </div><?php /* End .promo-info */ ?>

                                <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                                    
                                <?php endif; ?>

                        </header>

                        <div class="promo-wrap">
                                
                            <div class="promo-form">
                                    
                                <?php the_content(); ?>

                            </div><?php /* End .promo-form */ ?>

                            <?php $post_object = get_field('attach_promo');
                                
                            if( $post_object ): 
                                    
                            // override $post
                            $post = $post_object;
                            setup_postdata( $post ); ?>

                            <div class="promo-download">

                                <?php $current_user = wp_get_current_user(); ?>

                                <!-- <h2><span class="review-nickname"><?php echo $current_user->nickname; ?></span>, <span class="review-thanks"></span></h2> -->

                                <p class="small">For individual track downloads, use the download buttons next to each track on the right →</p>

                                 <?php $project = get_field('project_download'); ?>

                                <a class="btn orange" href="<?php echo $project; ?>">Download Zip</a>

                                <a href="<?php echo $project; ?>" class="dropbox-saver">Save to Dropbox</a>

                                <p>Remember, if you <span class="icon-heart"></span> it, chart it!</p>

                            </div><?php /* End .promo-download */ ?>

                        </div><?php /* End .promo-wrap */ ?>

                    </section>

                    <section class="right-section">

                        <div class="promo-player">

                            <h4><?php $image = get_field('small_logo');

                            if( !empty($image) ): ?>

                            <img class="small-logo" src="<?php echo $image['url']; ?>" />

                            <?php endif; ?>

                            <span class="cat-number"><?php the_field('catalog_number', false, false); ?></span> Tracks</h4>

                            <div class="player-container" data-state="idle">
                                    
                                <div id="wave"><span class="track-progress">00:00</span></div>

                                <div class="player-controls">
                    
                                    <button class="" id="playPrev">

                                        <span class="icon-backward2"></span>
                                        <!-- Previous Track -->
                                          
                                    </button>

                                    <button class="" id="playPause">
                                        
                                        <span id="play" style="">
                                            <span class="icon-play3"></span>
                                            <!-- Play -->
                                        </span>

                                        <span id="pause" style="display: none;">
                                            <span class="icon-pause2"></span>
                                            <!-- Pause -->
                                        </span>
                        
                                    </button>

                                    <button class="" id="playNext">
                                        
                                        <span class="icon-forward3"></span>
                                        <!-- Next Track -->
                                        
                                    </button>

                                    <button class="player-control-button volume-on" id="mutetoggle">
                                        
                                        <span id="soundon" class="icon-volume-medium"></span>
                                        <span id="soundoff" class="icon-volume-mute2" style="display: none;"></span>
                                        <!-- Mute -->
                        
                                    </button>

                                    <!-- <span id="slider"></span> -->

                                    <div class="vertical">
                                        
                                        <div id="flat-slider-vertical-3"></div>
                    
                                    </div>

                                    <!-- <div id="flat-slider"></div> -->
                    
                                </div><?php /* End .player-controls */ ?>

                                <div class="list-group playlist-outer">

                                    <?php if( have_rows('tracks') ): ?>

                                    <ul id="playlist">

                                    <?php while( have_rows('tracks') ): the_row(); 

                                    // vars
                                    $track = get_sub_field('stream_url');
                                    $title = get_sub_field('track_title');
                                    $artist = get_sub_field('track_artist');
                                    $download = get_sub_field('download_url');
        
                                    ?>

                                        <li>
        
                                            <a href="<?php echo $track; ?>" class="list-group-item"><span class="track-text"><?php echo $artist;?> - <?php echo $title; ?></span></a> <span class="download animated bounce"><a href="<?php echo $download; ?>"><span class="icon-cloud-download2"></span></a></span>
           
                                        </li>

                                    <?php endwhile; ?>

                                    </ul>

                                    <?php endif; ?>

                                </div><?php /* End .playlist-outer */ ?>
                
                            </div><?php /* End .player-container */ ?>
                                    
                            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                            <?php endif; ?>
                                        
                        </div><?php /* End .promo-player */ ?>

                    </section><?php /* End .right-section */ ?>

                    <footer class="article-footer">

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

            </main><?php /* End #main */ ?>

        </div><?php /* End #inner-content */ ?>

    </div><?php /* End #content */ ?>

<?php get_footer(); ?>

<script>
jQuery(document).ready(function($){

    var $list   = $('#playlist li span.track-text');
    var $select = $('.gfield_select');
    var index = 0;

    $list.each(function(index) {
        // console.log(this);
    $('<option />').attr('value', index + ' - ' + $(this).text()).html($(this).text()).appendTo($select);
    $($select).show();
    });


    $('.promo-drop-down').insertAfter('.promo-affiliations');

    $('#input_2_9').attr('value', '');

    $('.promo-name .gfield_required').clone().insertAfter('.promo-drop-down > label, .promo-review > label, .promo-rating > label');

    // $('.gform_footer').insertAfter('#field_2_2');

    $('#playlist > li').each(function() {
        $(this).prepend("<span class='track-number'>" + ($(this).index() +1) + "</span>");
    });

}); <?php /* End document ready */ ?>


// Responsive jQuery: check for element on resize
jQuery(document).ready(function($) {
    // run test on initial page load
    checkSize();

    // run test on resize of the window
    $(window).resize(checkSize);
});

//Function to the css rule
function checkSize(){
    if (jQuery(".entry-content").css("max-width") == "100%" ){
        jQuery(".right-section").insertBefore('.promo-wrap');
    }
}

jQuery(document).ready(function($){
 
    var $formID = $('.gform_wrapper > form').attr('id');
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

        var submit = $.ajax({
    
            url: $($formID).attr('action'),
            type: 'post',
            // dataType: 'json',
            data: $('#' + $formID).serialize(),
            success: function() {
            // callback code here
            console.log('success');
            var a = Math.random() + ""
            var rand1 = a.charAt(5)
            quotes = new Array
            quotes[1] = "you rock!"
            quotes[2] = "wasn't that easy? Promos can be fun."
            quotes[3] = "we love djs who leave reviews. Also, pizza."
            quotes[4] = "enjoy your new Vizual tracks!"
            quotes[5] = "go forth and destroy the party my child."
            quotes[6] = "these tracks are now in your hands. Do us proud."
            quotes[7] = "thanks for the support! Now go away...read some books!"
            quotes[8] = "be good, or be good at it."
            quotes[9] = "every time you play our tracks, a puppy is born."
            quotes[0] = "if you're downloading for someone else, we still love you. Kinda."
            var quote = quotes[rand1];
            
            
            $(".promo-download").show().appendTo('.promo-rating');
            $('.promo-download').css('width', '300px');
            $('.gform_wrapper > form :input').prop("disabled", true);
            $('.promo-review').find( 'textarea').first().css('border', '0');
            $('.promo-rating .rating').css('border', '0');
            $('.promo-drop-down').find('select').first().css('border', '0');
            $('.qtip').qtip('disable');
            $('.gform_button').hide();
            $('.download').fadeIn(200);
            // $('.review-thanks').html(quote);
            
            
            }
        })

    }
}

});

// Wavesurfer Code

jQuery(document).ready(function($) {
    var wavesurfer = Object.create(WaveSurfer);
    var play = $('.icon-play3');
    var playerstatecontainer = $('.player-container');
    var playPause = $('#playPause');
    var links = $('.list-group-item');
    var track1 = $('#track1');
    var mutetoggle = $("#mutetoggle");
    
    wavesurfer.init({
        container: '#wave',
        cursorColor: '#000',
        cursorWidth: 2,
        progressColor: '#007EFF',
        waveColor: '#555555',
        dragSelection: true,
        selectionBorder: false,
        selectionBorderColor: '#30aEFF',
        selectionForeground: true,
        markerWidth: 2,
        height: 100,
        backend: 'MediaElement'
    });

// Bind controls
 
    // var playPause = $('#playPause');
    // var links = $('#playlist a');
    playPause.click(function () {
        wavesurfer.playPause();
    });

    // Toggle play/pause text
    wavesurfer.on('play', function () {
        $('#play').css('display', 'none');
        $('#pause').css('display', '');
        setplayerstate('playing');
    });
    wavesurfer.on('pause', function () {
        $('#play').css('display', '');
        $('#pause').css('display', 'none');
        setplayerstate('paused');
    });

    // The playlist links
    var currentTrack = 0;

    // Load a track by index and highlight the corresponding link
    var setCurrentSong = function (index) {
        links[currentTrack].classList.remove('active');
        currentTrack = index;
        links[currentTrack].classList.add('active');
        wavesurfer.load(links[currentTrack].href);
    };

    var index = 0;
    // Load the track on click
    $(links).each(function (index) {
        $(this).on('click', function (e) {
            e.preventDefault();
            setCurrentSong(index);
            if ( getplayerstate() == 'paused' || getplayerstate() == 'idle') {
                wavesurfer.play();
                setplayerstate('playing');
            } else if ( getplayerstate() == 'playing') {
                wavesurfer.pause();
                setplayerstate('paused');
            }
        });
    });

    $('#playPrev').click(function(){
        setCurrentSong((currentTrack - 1) % links.length);
        wavesurfer.play();
        setplayerstate('playing');
    });

    $('#playNext').click(function(){
        setCurrentSong((currentTrack + 1) % links.length);
        wavesurfer.play();
        setplayerstate('playing');
    });

    // Play on audio load
    wavesurfer.on('ready', function () {
        // wavesurfer.pause();
    });

    // Go to the next track on finish
    wavesurfer.on('finish', function () {
        setCurrentSong((currentTrack + 1) % links.length);
    });

    mutetoggle.on('click', function() {
        wavesurfer.toggleMute();
        // togglemutebuttonstyle();
        if ($('#soundon').is(':visible')) {
            $('#soundoff').show();
            $('#soundon').hide();
        } else {
            $('#soundoff').hide();
            $('#soundon').show();
        }
    });

    wavesurfer.on('play', function() {
        var duration = formattrackduration(wavesurfer.getCurrentTime()) || formattrackduration(wavesurfer.getDuration());
        // console.log(duration);
        // $('.track-progress').html(duration);
        // start timer
        var durationinterval = new durationInterval(function() {
            if (wavesurfer.getCurrentTime() < wavesurfer.getDuration()) {
                duration = formattrackduration(wavesurfer.getCurrentTime());
                $('.track-progress').html(duration);
                var prog = Math.round((wavesurfer.getCurrentTime() * 1000) /
                    wavesurfer.getDuration());
                $('.progress-bar').animate({
                    width: prog + 'px'
                }, 1000, 'linear');
            }
        }, 1000);
    });

    // Load the first track
    setCurrentSong(currentTrack);

    // Set up volume slider with pips
    $("#flat-slider-vertical-3").slider({
        range: "min",
        min: 0,
        max: 100,
        value: 80,
        orientation: "horizontal",
        slide: function(event, ui) {
            var slidernumber = ui.value;
            var volume = slidernumber / 100;
            playerstatecontainer.attr('data-vol', volume);
            $('.ui-slider-handle').html(slidernumber);
            // $('.ui-slider-handle, .ui-slider-range').attr('style', 'left:' + volume - 10 + '%');
            wavesurfer.setVolume(volume);
        }
    })
    .slider("pips", {
        first: "pip",
        last: "pip",
        step: 5
    
    })
    .slider("float", {

    });

    var vol = $('#slider').slider("option", "value");
    $('.ui-slider-handle').html(vol);
    var volcorrect = vol - 10;
    // $('.ui-slider-handle, .ui-slider-range').attr('style', 'left:' + volcorrect + '%');
    // $('.handle').attr('style','left: 300px');

// Necessary functions

    function getplayerstate() {
        return playerstatecontainer.attr('data-state');
    };
    function setplayerstate(state) {
        playerstatecontainer.attr('data-state', state);
    };

    function pauseplayer() {
        wavesurfer.pause();
        weneedplaybutton();
        setplayerstate('paused');
    }
    function formattrackduration(tracklength) {
        var totalSec = new Date(tracklength); //) / 1000;
        var hours = parseInt(totalSec / 3600) % 24;
        var minutes = parseInt(totalSec / 60) % 60;
        var seconds = totalSec % 60;
        var result = (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds <
            10 ? "0" + seconds : seconds);
        return result;
    };

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
});

</script>