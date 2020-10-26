<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Shopper
 */

?>

		</div><!-- .col-full -->
	</div><!-- #content -->

	<?php //do_action( 'shopper_before_footer' ); ?>

	<section class="row footerBanner">

        <div class="row m0 mt-0 inner">

            <div class="container">

                <div class="row">

					<!-- <img src="/wp-content/themes/shopper/assets/images/custom/constructor.png" width="350px" class="img-responsive fleft property ml-5 mr-5"> -->
					<!-- <img src="https://paulaespindolainmobiliaria.com.ar/wp-content/uploads/2020/02/png-casa-e1581197246710.png" alt="" class="img-responsive fleft property"> -->

                   <!--  <div class="fleft banner_texts">

                        <h2>Materiales de Construcción</h2>

						<h3>Los mejores precios, siempre.</h3>
						
                    </div> -->

					<div class="fleft banner_texts mb-5 mt-5 pb-5 pl-0 mx-auto">
						<h2>Todas las soluciones para construir en un sólo lugar</h2>
					</div>

                    
                </div>

            </div>

        </div>

    </section>

	<footer id="colophon" class="site-footer row" role="contentinfo">

        <div class="container">

            <div class="row">

				<div class="col-sm-4 widget recentPostWidget">

					<div class="row m0 widgetInner d-flex flex-column align-items-center justify-content-center">

						<img src="<?php echo get_template_directory_uri().'/assets/images/LUZZI_blanco.png'; ?>" alt="LUZZI">

						<br><br>

						<a href="<?php echo esc_url( home_url('/nuestras-obras') ); ?>"><h4>NUESTRAS OBRAS</h4></a>

					</div>

				</div>

				<div class="col-sm-4 widget aboutWidget">

					<div class="row m0 widgetInner">			
						<h4>Sucursales Corrientes</h4>

						<p>Av. Raúl Alfonsín 4455, W3402</p>
						
						<p>Av. Independencia 3798, W3400</p>
						
					</div>
				</div>

				<div class="col-sm-4 widget oppeningHoursWidget">

					<div class="row m0 widgetInner">

						<h4>Contacto</h4>

						<ul class="nav">

							<li>Llámanos</li>

							<li>+54 379 569669 / +54 379 542798</li>

							<li>Escribenos</li>

							<li>ventas@luzzicorrientes.com.ar</li>

						</ul>

					</div>

				</div>

            </div>

            <div class="copyrightRow row">

                <div class="col-sm-5 copyright">
					Luzzi Corrientes ©2020. Todos los derechos reservados.
				</div>

                <div class="col-sm-2 goTop"><a href="#top"><i class="fa fa-angle-up"></i></a></div>

                <div class="col-sm-5 footSocial" style="display:flex; justify-content:space-between; align-items:center;">

                    <p class="mb-0" style="color:white"></p>

                    <ul class="nav nav-pills fright">
						
						<li><a href="https://www.facebook.com/LuzziCorrientes"  target="_blank"><i class="fa fa-facebook"></i></a></li>
						<li><a href="https://www.instagram.com/luzzicorrientes/" target="_blank"><i class="fa fa-instagram"></i></a></li>
						 
                    </ul>

                </div>

            </div>

        </div>

    </footer>

	<?php do_action( 'shopper_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
