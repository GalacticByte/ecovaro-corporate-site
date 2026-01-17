	</div><!-- #content -->

	<footer id="siteFooter" class="gbyte-footer">
		<div class="gbyte-footer__container">
			<div class="row">
				<div class="col-md-6">
					<div class="gbyte-footer__brand">
						<?php
						$footer_logo_id = carbon_get_theme_option( 'global_footer_logo' );
						$footer_logo_url = $footer_logo_id ? wp_get_attachment_image_url( $footer_logo_id, 'full' ) : get_template_directory_uri() . '/assets/images/strona-glowna/logo-bottom.svg';
						?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) . ' - ' . __( 'Strona główna', 'ecovaro' ) ); ?>">
							<img src="<?php echo esc_url( $footer_logo_url ); ?>" alt="" aria-hidden="true">
						</a>
					</div>

					<?php
					$socials = carbon_get_theme_option( 'global_footer_socials' );
					if ( ! empty( $socials ) ) : ?>
						<div class="gbyte-footer__socials">
							<?php foreach ( $socials as $social ) : ?>
								<?php
								$social_icon_id = $social['social_icon'];
								$social_link = $social['social_link'];
								$social_icon_url = $social_icon_id ? wp_get_attachment_image_url( $social_icon_id, 'full' ) : '';
								?>
								<?php if ( $social_link && $social_icon_url ) : ?>
									<?php
									$host = parse_url( $social_link, PHP_URL_HOST );
									$host = str_ireplace( 'www.', '', $host );
									$social_label = ( $host ? $host : __( 'Social media', 'ecovaro' ) ) . ' ' . __( '(otwiera się w nowym oknie)', 'ecovaro' );
									?>
									<a href="<?php echo esc_url( $social_link ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr( $social_label ); ?>">
										<img src="<?php echo esc_url( $social_icon_url ); ?>" alt="" aria-hidden="true">
									</a>
								<?php endif; ?>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

					<div class="gbyte-footer__headline-mobile">
						<h2><?php echo wp_kses_post( carbon_get_theme_option( 'global_footer_headline_mobile' ) ); ?></h2>
					</div>

					<div class="gbyte-footer__address">
						<?php
							$phone = carbon_get_theme_option( 'global_footer_phone' );
							$address = carbon_get_theme_option( 'global_footer_address' );
							$company = carbon_get_theme_option( 'global_footer_company' );
						?>

						<?php if ( $company ) : ?>
								<p><?php echo cf_text( $company );?></p>
						<?php endif; ?>

						<?php if ( $phone ) : ?>
								<p><a href="tel:<?php echo esc_attr( str_replace( ' ', '', $phone ) ); ?>"><?php echo cf_text( $phone ); ?></a></p>
						<?php endif; ?>
						<address>
							<?php if ( $address ) : ?>
							<p><?php echo nl2br( cf_text( $address ) ); ?></p>
							<?php endif; ?>
						</address>
					</div>
				</div>

				<div class="col-md-6 gbyte-footer__menu">
					<h2><?php echo cf_text( carbon_get_theme_option( 'global_footer_headline_desktop' ) ); ?></h2>

					<div class="row">
						<h3><?php _e( 'Mapa strony', 'ecovaro' ); ?></h3>
						<div class="col-lg-6">
							<?php
							wp_nav_menu( array(
								'theme_location' => 'footer1',
								'container'      => false,
								'menu_class'     => 'footer-menu',
								'depth'			 => 1,
							) );
							?>
						</div>

					</div>
				</div>
			</div>

			<div class="gbyte-footer__bottom">
				<div class="gbyte-footer__bottom-wrapper">
					<div class="gbyte-footer__bottom-item">
						<p><?php echo cf_text( carbon_get_theme_option( 'global_footer_copyright' ) ); ?></p>
					</div>
					<?php
					$privacy_entries = carbon_get_theme_option( 'global_privacy_policy' );
					$privacy_link = $privacy_entries ? $privacy_entries[0] : null;
					// Check if the link has been defined (has a URL and a title)
					if ( $privacy_link && ! empty( $privacy_link['url'] ) && ! empty( $privacy_link['title'] ) ) : ?>
						<?php
						$p_target = $privacy_link['target'] ?: '_self';
						$p_rel = ( '_blank' === $p_target ) ? ' rel="noopener noreferrer"' : '';
						$p_label = ( '_blank' === $p_target ) ? ' aria-label="' . esc_attr( $privacy_link['title'] . ' ' . __( '(otwiera się w nowym oknie)', 'ecovaro' ) ) . '"' : '';
						?>
						<div class="gbyte-footer__bottom-item">
							<p><a href="<?php echo esc_url( $privacy_link['url'] ); ?>" target="<?php echo esc_attr( $p_target ); ?>"<?php echo $p_rel . $p_label; ?>><?php echo esc_html( $privacy_link['title'] ); ?></a></p>
						</div>
					<?php endif; ?>

					<?php
					// Get the "Link" field for cookies

					$cookie_entries = carbon_get_theme_option( 'global_cookie_link' );
					$cookies_link = $cookie_entries ? $cookie_entries[0] : null;
					if ( $cookies_link && ! empty( $cookies_link['url'] ) && ! empty( $cookies_link['title'] ) ) : ?>
						<?php
						$c_target = $cookies_link['target'] ?: '_self';
						$c_rel = ( '_blank' === $c_target ) ? ' rel="noopener noreferrer"' : '';
						$c_label = ( '_blank' === $c_target ) ? ' aria-label="' . esc_attr( $cookies_link['title'] . ' ' . __( '(otwiera się w nowym oknie)', 'ecovaro' ) ) . '"' : '';
						?>
						<div class="gbyte-footer__bottom-item">
							<p><a href="<?php echo esc_url( $cookies_link['url'] ); ?>" target="<?php echo esc_attr( $c_target ); ?>"<?php echo $c_rel . $c_label; ?>><?php echo esc_html( $cookies_link['title'] ); ?></a></p>
						</div>
					<?php endif; ?>

					<div class="gbyte-footer__bottom-item">
						<p><?php echo wp_kses_post( carbon_get_theme_option( 'global_footer_bottom_tagline' ) ); ?></p>
					</div>
				</div>
				<div class="gbyte-footer__bottom-mobile-wrapper">
					<div class="gbyte-footer__bottom-item">
						<p><?php echo wp_kses_post( carbon_get_theme_option( 'global_footer_bottom_tagline' ) ); ?></p>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
