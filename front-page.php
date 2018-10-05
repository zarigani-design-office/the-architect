<?php
/**
 * The front-page template file
 *
 * @package the_architect
 */

get_header();
?>

	<div id="primary" class="content-area front-page">
		<main id="main" class="site-main">

			<?php
		/*if ( have_posts() ) :


			 Start the Loop 
			while ( have_posts() ) :
				the_post();
			var_dump(get_post_meta($post->ID));
			

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

			endif;*/
			//カスタムフィールド読み込み
			if ( class_exists( 'Smart_Custom_Fields' ) ):
			$top_custom_fields = SCF::get_option_meta( 'theme-options' );
			?>
			
			<div class="top-slider-wrapper">
				<div class="top-slider">
					<?php 
					foreach( $top_custom_fields[ 'top-slider-cf' ] as $top_slider ) :
					?>
					<div class="top-slider-image">
						<?php echo wp_get_attachment_image( $top_slider[ 'top-slider-image' ] , 'original', false );?>
					</div>
					<?php endforeach?>
				</div>
			</div>
			
			<div class="top-content-wrapper">
				<?php if( in_array( 'about', $top_custom_fields[ 'top-check-list' ] ) ):?>
				<section class="top-content-block about">
					<figure  class="top-content-block-img about">
						<?php
						echo wp_get_attachment_image( $top_custom_fields[ 'top-about-image' ] , 'large', false );
						?>
					</figure>
					<div class="top-content-block-text about">
						<div class="top-content-text-inner">
							<h1 class="basic-ttl">
								ABOUT US
							</h1>
							<p class="basic-text top-content-block-p">
								<?php echo esc_html( $top_custom_fields[ 'top-about-text' ] );?>
							</p>
							<a href="<?php echo esc_url( home_url().'/about/' );?>" class="basic-link">More</a>
						</div>
					</div>
				</section>
				<?php endif;//about?>
				
				<?php if( in_array( 'works', $top_custom_fields[ 'top-check-list' ] ) ):?>
				<section class="top-content-block works">
					<figure  class="top-content-block-img works">
						<?php
						echo wp_get_attachment_image( $top_custom_fields[ 'top-works-image' ] , 'large' );
						?>
					</figure>
					<div class="top-content-block-text works">
						<div class="top-content-text-inner">
							<h1 class="basic-ttl">
								WORKS
							</h1>
							<p class="basic-text top-content-block-p">
								<?php echo esc_html( $top_custom_fields[ 'top-works-text' ] );?>
							</p>
							<a href="./works/" class="basic-link">More</a>
						</div>
					</div>
				</section>
				
				<?php endif;//works?>
				
				<?php if( in_array( 'news', $top_custom_fields[ 'top-check-list' ] ) ):?>
				<section class="top-content-block news">
					<figure  class="top-content-block-img news">
						<?php
						echo wp_get_attachment_image( $top_custom_fields[ 'top-news-image' ] , 'large' );
						?>
					</figure>
					<div class="top-content-block-text news">
						<div class="top-content-text-inner">
							<h1 class="basic-ttl">
								NEWS
							</h1>
							<ul class="top-content-block-news-list">
							
							
								<?php 
								$news_query_arg = array(
									'post_type' => 'the_architect_news',
									'posts_per_page' => 3,
								);
								$news_query = new WP_Query($news_query_arg);
								if($news_query -> have_posts()):
								while($news_query -> have_posts()):
								$news_query -> the_post();
								?>
								<li>
									<time class="top-news-time" datetime="<?php the_date( 'Y-m-d' ) ?>">
										<?php echo get_the_date();?>
									</time>
									<a href="<?php the_permalink()?>" class="top-news-time-link">
										<?php echo get_the_title();?>
									</a>
								</li>
								<?php 
								endwhile;
								endif;
								?>
							</ul>
							<a href="./news/" class="basic-link">More</a>
						</div>
					</div>
				</section>
				
				<?php endif;//news?>
				
				<?php if( in_array( 'blog', $top_custom_fields[ 'top-check-list' ] ) ):?>
				<section class="top-content-block blog">
					<figure  class="top-content-block-img blog">
						<?php
						echo wp_get_attachment_image( $top_custom_fields[ 'top-blog-image' ] , 'large' );
						?>
					</figure>
					<div class="top-content-block-text blog">
						<div class="top-content-text-inner">
							<h1 class="basic-ttl">
								BLOG
							</h1>
							<ul class="top-content-block-news-list">


								<?php 
								$blog_query_arg = array(
									'post_type' => 'post',
									'posts_per_page' => 3,
								);
								$blog_query = new WP_Query($blog_query_arg);
								if($blog_query -> have_posts()):
								while($blog_query -> have_posts()):
								$blog_query -> the_post();
								?>
								<li>
									<time class="top-news-time" datetime="<?php the_date( 'Y-m-d' ) ?>">
										<?php echo get_the_date();?>
									</time>
									<a href="<?php the_permalink()?>" class="top-news-time-link">
										<?php echo get_the_title();?>
									</a>
								</li>
								<?php 
								endwhile;
								endif;
								?>
							</ul>
							<a href="<?php echo esc_url( home_url().'/blog/' )?>" class="basic-link">More</a>
						</div>
					</div>
				</section>
				
				<?php endif;//blog?>
				
				<?php if( in_array( 'contact', $top_custom_fields[ 'top-check-list' ] ) ):?>
				<section class="top-content-contact">
					<!--<figure  class="top-content-block-img contact">
						<?php
						echo wp_get_attachment_image( $top_custom_fields[ 'top-contact-image' ] , 'large' );
						?>
					</figure>-->
					<div class="top-content-block-contact-wrapper">
						<p class="top-contact-welcome">
							まずは、お気軽にご相談ください。
						</p>
						<h1 class="basic-ttl">
							CONTACT
						</h1>
						<div class="top-content-block-contact">
							<?php echo apply_filters('the_content', $top_custom_fields[ 'top-contact-text' ]);?>
						</div>
					</div>
				</section>
				<?php endif;//contact?>
			</div>

			<?php endif;//class_exists?>

		</main>
		<!-- #main -->
	</div>
	<!-- #primary -->
	<script defer>
		jQuery(function($) {
			$( '.top-slider' ).slick( {
				arrows: false,
				dots: false,
				infinite: true,
				fade: true,
				autoplay: true,
				autoplaySpeed: 1800,
				speed: 1800,
				adaptiveHeight: true,
				easing: 'ease-in-out',
				pauseOnFocus: false,
				pauseOnHover : false,
			} );
			
			/*$( window ).scroll( function() {
				let scrollVal = $( window ).scrollTop();
				//console.log(scrollVal)
				$( '.top-content-block-border' ).each( function() {
					let offsetTop = $( this ).offset().top;
					var translate = ( offsetTop - scrollVal - 260 ) / 8
					$( this ).css( {
						'transform' : 'translateY('+translate+'px)'
					} )
				} )
				$( '.top-content-block-text' ).each( function() {
					let offsetTop = $( this ).offset().top;
					var translate = ( offsetTop - scrollVal - 250 ) / 16
					$( this ).css( {
						'transform' : 'translateY('+translate+'px)'
					} )
				} )
				$( '.top-content-block-img img' ).each( function() {
					let offsetTop = $( this ).offset().top;
					var translate = ( offsetTop - scrollVal + 0) / 24
					$( this ).css( {
						'transform' : 'translateY('+translate+'px)'
					} )
				} )
			} )*/
		});
	</script>
	<?php
get_footer();