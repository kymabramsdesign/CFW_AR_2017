<footer class="footer-bottom">
    <div class="wrap">
        <div class="container">
            <!-- Social Icons -->
            <ul class="social-icons">

                <?php
                    px_socialLink('social_facebook_url', __('Facebook Profile', TEXTDOMAIN), 'icon-facebook3' , 'facebook');//Facebook
                    px_socialLink('social_twitter_url', __('Twitter Profile', TEXTDOMAIN), 'icon-twitter2' , 'twitter'); // Twitter
                    px_socialLink('social_vimeo_url', __('Vimeo Profile', TEXTDOMAIN), 'icon-vimeo' , 'vimeo'); // Vimeo
                    px_socialLink('social_youtube_url', __('YouTube Profile', TEXTDOMAIN), 'icon-youtube' , 'youtube'); // Youtube
                    px_socialLink('social_googleplus_url', __('Google+ Profile', TEXTDOMAIN), 'icon-googleplus2' , 'googleplus2'); //Google+
                    px_socialLink('social_dribbble_url', __('Dribbble Profile', TEXTDOMAIN), 'icon-dribbble2', 'dribbble');//Dribbble
                    px_socialLink('social_tumblr_url', __('Tumblr Profile', TEXTDOMAIN), 'icon-tumblr2', 'tumblr2');//Tumblr
                    px_socialLink('social_linkedin_url', __('Linkedin Profile', TEXTDOMAIN), 'icon-linkedin2', 'linkedin2');//Linkedin
                    px_socialLink('social_flickr_url', __('Flickr Profile', TEXTDOMAIN), 'icon-flickr2', 'flickr4');//flickr
                    px_socialLink('social_forrst_url', __('forrst Profile', TEXTDOMAIN), 'icon-forrst' , 'forrst');//forrst
                    px_socialLink('social_github_url', __('github Profile', TEXTDOMAIN), 'icon-github' , 'github5');//github
                    px_socialLink('social_lastfm_url', __('lastfm Profile', TEXTDOMAIN), 'icon-lastfm', 'lastfm');//lastfm
                    px_socialLink('social_paypal_url', __('paypal Profile', TEXTDOMAIN), 'icon-paypal', 'paypal');//paypal
                    px_socialLink('social_rss_url', __('RSS Feed', TEXTDOMAIN), 'icon-feed2', 'feed2');//rss
                    px_socialLink('social_skype_url', __('skype  Profile', TEXTDOMAIN), 'icon-skype' , 'skype');//skype
                    px_socialLink('social_wordpress_url', __('wordpres Profile', TEXTDOMAIN), 'icon-wordpress', 'wordpress');//wordpress
                    px_socialLink('social_yahoo_url', __('yahoo Profile', TEXTDOMAIN), 'icon-yahoo' , 'yahoo');//Yahoo
                    px_socialLink('social_deviantart_url', __('deviantart', TEXTDOMAIN), 'icon-deviantart', 'deviantart');//Deviantart
                    px_socialLink('social_steam_url', __('steam Profile', TEXTDOMAIN), 'icon-steam', 'steam');//steam
                    px_socialLink('social_reddit_url', __('reddit Profile', TEXTDOMAIN), 'icon-reddit' , 'reddit');//reddit
                    px_socialLink('social_stumbleupon_url', __('stumbleupon Profile', TEXTDOMAIN), 'icon-stumbleupon' , 'stumbleupon2');//stumbleupon
                    px_socialLink('social_pinterest_url', __('pinterest Profile', TEXTDOMAIN), 'icon-pinterest', 'pinterest');//Pinterest
                    px_socialLink('social_xing_url', __('xing Profile', TEXTDOMAIN), 'icon-xing', 'xing2');//xing
                    px_socialLink('social_blogger_url', __('blogger Profile', TEXTDOMAIN), 'icon-blogger', 'blogger');//blogger
                    px_socialLink('social_soundcloud_url', __('soundcloud Profile', TEXTDOMAIN), 'icon-soundcloud', 'soundcloud');//soundcloud
                    px_socialLink('social_delicious_url', __('delicious Profile', TEXTDOMAIN), 'icon-delicious', 'delicious');//delicious
                    px_socialLink('social_foursquare_url', __('foursquare Profile', TEXTDOMAIN), 'icon-foursquare', 'foursquare');//foursquare
                    px_socialLink('social_instagram_url', __('instagram Profile', TEXTDOMAIN), 'icon-instagram', 'instagram');//foursquare
                ?>

            </ul>

            <?php if ( px_opt('footer-logo') ) { ?>

                <!-- Footer logo  -->
                <div class="footerlogo">
                    <a href="http://www.cfw.org" target="_blank"><img class="secoundLogo" src=" <?php px_eopt('footer-logo'); ?>" alt="footer_Logo"></a>
                </div>

            <?php } ?>

            <!-- CopyRight  -->
            <p class="copyright">
                <?php px_eopt('footer-copyright'); ?>
            </p>

        </div>
    </div>
</footer>
