<?php
	
	if (isset($_POST['upload'])) {
		print_r($_POST['upload']);
		exit;
	}
	global $lumise;
	
	$arg = array(

		'tabs' => array(

			'details:' . $lumise->lang('Detalles') => array(
				array(
					'type' => 'input',
					'name' => 'name',
					'label' => $lumise->lang('Nombre'),
					'required' => true,
					'default' => 'Untitled'
				),
				(
					$lumise->connector->platform == 'php'? 
					array(
						'type' => 'input',
						'name' => 'price',
						'label' => $lumise->lang('Precio'),
						'default' => '0',
						'desc' => $lumise->lang('Ingrese el precio base para este producto')
					) : null
				),
				(
					$lumise->connector->platform == 'php' ?
					array(	
						'type' => 'upload',
						'name' => 'thumbnail',
						'thumbn' => 'thumbnail_url',
						'path' => 'thumbnails'.DS,
						'label' => $lumise->lang('Miniatura del producto'),
						'desc' => $lumise->lang('Archivos soportados svg, png, jpg, jpeg. Tamaño máximo 5 MB')
					)
					:
					array(
						'type' => 'input',
						'name' => 'product',
						'label' => $lumise->lang('Producto CMS'),
						'default' => '0',
						'desc' => $lumise->lang('Este producto no aparecerá en la lista si este valor de campo es cero. Se configurará automáticamente cuando seleccione esta base de productos para un producto de Woocommerce'),
						'readonly' => true
					)
				)
				,
				array(
					'type' => 'text',
					'name' => 'description',
					'label' => $lumise->lang('Descripcion')
				),
				array(
					'type' => 'categories',
					'cate_type' => 'products',
					'name' => 'categories',
					'label' => $lumise->lang('Categorias'),
					'id' => isset($_GET['id'])? $_GET['id'] : 0
				),
				array(
					'type' => 'printing',
					'name' => 'printings',
					'label' => $lumise->lang('Tecnicas de impresion'),
					'desc' => $lumise->lang('Seleccione Técnicas de impresión con cálculos de precios para este producto').'<br>'.$lumise->lang('Arrastre para organizar los elementos, el primero se establecerá como predeterminado').'. <br><a href="'.$lumise_router->getURI().'lumise-page=printings" target=_blank>'.$lumise->lang('Puedes administrar todas las impresiones aquí').'.</a>'
				),
				array(
					'type' => 'toggle',
					'name' => 'active',
					'label' => $lumise->lang('Activo'),
					'default' => 'yes',
					'value' => null,
					'desc' => $lumise->lang('Desactivar no afecta a los productos seleccionados. Solo no se mostrará en los productos de conmutación')
				),
				array(
					'type' => 'input',
					'name' => 'order',
					'type_input' => 'number',
					'label' => $lumise->lang('Pedido'),
					'default' => 0,
					'desc' => $lumise->lang('Pedido de artículo con otro')
				),
			),

			'design:' . $lumise->lang('Diseños') => array(
				array(
					'type' => 'stages',
					'name' => 'stages'
				)
			),
			
			'variations:' . $lumise->lang('Variaciones') => array(
				array(
					'type' => 'variations',
					'name' => 'variations'
				)
			),

			'attributes:' . $lumise->lang('Atributos') => array(
				array(
					'type' => 'attributes',
					'name' => 'attributes'
				),
			)
		)
	);
	
	$fields = $lumise_admin->process_data($arg, 'products');
	
?>

<div class="lumise_wrapper" id="lumise-product-page">
	<div class="lumise_content">
		<?php

			$lumise->views->detail_header(array(
				'add' => $lumise->lang('Agregar nuevo Producto'),
				'edit' => $fields['tabs']['details:' . $lumise->lang('Detalles')][0]['value'],
				'page' => 'product'
			));

		?>
		<form action="<?php
			echo $lumise_router->getURI();
		?>lumise-page=product<?php
			if (isset($_GET['callback']))
				echo '&callback='.$_GET['callback'];
		?>" id="lumise-product-form" method="POST" class="lumise_form" enctype="multipart/form-data">

			<?php $lumise->views->tabs_render($fields, 'products'); ?>

			<div class="lumise_form_group" style="margin-top: 20px">
				<input type="submit" value="<?php echo $lumise->lang('Guardar Producto'); ?>"/>
				<input type="hidden" name="do" value="action" />
				<input type="hidden" name="lumise-section" value="product">
			</div>
		</form>
	</div>
</div>

