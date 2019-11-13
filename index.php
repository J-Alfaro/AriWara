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
        <div class="lumise-hero">            
            <div class="owl-carousel owl-theme">
                <div class="item" style="background:url('<?php echo theme('assets/images/hero2.jpg', true); ?>') no-repeat;background-size:cover;">
                    <div class="container">
                        <h1><?php echo $lumise->lang('Nueva Colección 2019'); ?></h1>
                        <h4><?php echo $lumise->lang('Venta de hasta el 50% de todos los productos de la nueva colección'); ?></h4>
                        <a href="<?php echo $lumise->cfg->url.'products.php'; ?>"><?php echo $lumise->lang('Ver Colección'); ?></a>
                    </div>
                </div>
                <div class="item" style="background:url('<?php echo theme('assets/images/hero1.jpg', true); ?>')no-repeat;background-size:cover;">
                    <div class="container">
                        <h1><?php echo $lumise->lang('Descuentos solo hoy!'); ?></h1>
                        <h4><?php echo $lumise->lang('Aprovecha! 70% de descuentos para adquerir un producto personalizado'); ?></h4>
                        <a href="<?php echo $lumise->cfg->url.'products.php'; ?>"><?php echo $lumise->lang('Ver Colección'); ?></a>
                    </div>
                </div>
            </div>
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