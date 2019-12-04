<?php
	
require('autoload.php');

global $lumise;

$orderby  = '`order`';
$ordering = 'asc';
$dt_order = 'name_asc';
$current_page = isset($_GET['tpage']) ? $_GET['tpage'] : 1;

$search_filter = array(
    'keyword' => '',
    'fields' => 'name'
);

$default_filter = array(
    'type' => '',
);
$per_page = 8;
$start = ( $current_page - 1 ) * $per_page;
$data = $lumise->lib->get_rows('products', $search_filter, $orderby, $ordering, $per_page, $start, array('active'=> 1), '');

include(theme('header.php'));

?>
 <!--Instanciando css y js para slider-->

 <link rel="stylesheet" href="assets/slider-responsive/flexslider.css" type="text/css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
 <script src="assets/slider-responsive/js/jquery.flexslider.js"></script>
 <script type="text/javascript" charset="utf-8">
  $(window).load(function() {
    $('.flexslider').flexslider({
    	touch: true,
    	pauseOnAction: false,
    	pauseOnHover: false,
    });
  });
</script>

    <div class="flexslider">
		<ul class="slides">
			<li>
				<img src="assets/slider-responsive/imagenes/1.jpg" alt="">
				<section class="flex-caption">
					
				</section>
			</li>
			<li>
				<img src="assets/slider-responsive/imagenes/2.jpg" alt="">
				<section class="flex-caption">
					
				</section>
			</li>
			<li>
				<img src="assets/slider-responsive/imagenes/3.jpg" alt="">
				<section class="flex-caption">
					
				</section>
			</li>
		</ul>
	</div>
        
  

        <div class="container">
            <div class="lumise-services">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="box-info">
                            <i class="fa fa-truck" aria-hidden="true"></i>
                            <div class="content">
                                <h4><?php echo $lumise->lang('Envío gratis'); ?></h4>
                                <p><?php echo $lumise->lang('En todo los pedidos superiores a S/. 100.00 Nuevos Soles'); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="box-info">
                            <i class="fa fa-refresh" aria-hidden="true"></i>
                            <div class="content">
                                <h4><?php echo $lumise->lang('Garantía de dinero'); ?></h4>
                                <p><?php echo $lumise->lang('30 días de devolución de dinero'); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="box-info">
                            <i class="fa fa-credit-card" aria-hidden="true"></i>
                            <div class="content">
                                <h4><?php echo $lumise->lang('Pago asegurado'); ?></h4>
                                <p><?php echo $lumise->lang('Asegure todo sus pagos'); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="box-info">
                            <i class="fa fa-life-ring" aria-hidden="true"></i>
                            <div class="content">
                                <h4><?php echo $lumise->lang('Soporte de energía'); ?></h4>
                                <p><?php echo $lumise->lang('Soporte en línea 24/7'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php LumiseView::categories(); ?> 
        <div class="lumise-list">
            <div class="container">
                <h2><?php echo $lumise->lang('Productos destacados'); ?></h2>
                <?php LumiseView::products($data['rows']); ?>
            </div>
        </div>
        <div class="lumise-client">
            <div class="container">
            <h2 class="text-center"><b>COMPRAR POR MARCA</b></h2><br>
                <div class="row">
                    <div class="col-md-2 col-sm-4">
                        <div class="client"><img src="<?php echo theme('assets/images/logo1.jpg', true); ?>" alt=""></div>
                    </div>
                    <div class="col-md-2 col-sm-4">
                        <div class="client"><img src="<?php echo theme('assets/images/logo2.jpg', true); ?>" alt=""></div>
                    </div>
                    <div class="col-md-2 col-sm-4">
                        <div class="client"><img src="<?php echo theme('assets/images/logo3.jpg', true); ?>" alt=""></div>
                    </div>
                    <div class="col-md-2 col-sm-4">
                        <div class="client"><img src="<?php echo theme('assets/images/logo4.jpg', true); ?>" alt=""></div>
                    </div>
                    <div class="col-md-2 col-sm-4">
                        <div class="client"><img src="<?php echo theme('assets/images/logo5.jpg', true); ?>" alt=""></div>
                    </div>
                    <div class="col-md-2 col-sm-4">
                        <div class="client"><img src="<?php echo theme('assets/images/logo6.jpg', true); ?>" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
<?php include(theme('footer.php')); ?>