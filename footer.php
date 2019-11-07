<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<?php get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>

        <!--The div element for the map -->
        <div id="map" style="height: 400px; width: 100%"></div>
        <script>
            // Funktion som kallas av Google för att skapa vår karta
            // Denna function anger vi i en callback parameter i script
            function initMap() {
                // Sätt latitude och longitud i en variabel
                var uluru = {lat: -25.344, lng: 131.036};
                // Instansiera en ny Google Maps com är centrerad på ovanstående kordinater
                var map = new google.maps.Map(
                    document.getElementById('map'), {
                        zoom: 4,
                        center: uluru,
                        disableDefaultUI: true,
                        gestureHandling: 'none'
                    }
                );
                // Information ruta
                var contentString = '<div id="content">\n' +
                    '    <div id="siteNotice"></div>\n' +
                    '    <h1 id="firstHeading" class="firstHeading">Google Maps API är skoj :)</h1>\n' +
                    '    <div id="bodyContent">\n' +
                    '        <p>\n' +
                    '            <b>Hej allihopa!</b>\n' +
                    '            Här har vi nu en text som visas i en ruta när man klickar på markören :)<br>\n' +
                    '            Super bra om man vill visa information om något!\n' +
                    '        </p>\n' +
                    '    </div>\n' +
                    '</div>';
                // Instansiera en nya information ruta och sätt ovanstående html till den
                var infowindow = new google.maps.InfoWindow({
                    content: contentString
                });
                // Sätt ut en markering på kartan med positionen från vår variabel
                var marker = new google.maps.Marker(
                    {
                        position: uluru,
                        map: map,
                        icon: 'https://maps.google.com/mapfiles/kml/shapes/parking_lot_maps.png'
                    }
                );
                // Lägg till en listener på markören.
                // Om vi klickar ska vi öppna informationsrutan och placera den på samma ställe som markören
                marker.addListener('click', function() {
                    infowindow.open(map, marker);
                });
            }
        </script>
        <!--Load the API from the specified URL
        * The async attribute allows the browser to render the page while the API loads
        * The callback parameter executes the initMap() function
        -->
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
        </script>

        <div class="site-info">
			<?php $blog_info = get_bloginfo( 'name' ); ?>
			<?php if ( ! empty( $blog_info ) ) : ?>
				<a class="site-name" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>,
			<?php endif; ?>
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'twentynineteen' ) ); ?>" class="imprint">
				<?php
				/* translators: %s: WordPress. */
				printf( __( 'Proudly powered by %s.', 'twentynineteen' ), 'WordPress' );
				?>
			</a>
			<?php
			if ( function_exists( 'the_privacy_policy_link' ) ) {
				the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
			}
			?>
			<?php if ( has_nav_menu( 'footer' ) ) : ?>
				<nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer Menu', 'twentynineteen' ); ?>">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer',
							'menu_class'     => 'footer-menu',
							'depth'          => 1,
						)
					);
					?>
				</nav><!-- .footer-navigation -->
			<?php endif; ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
