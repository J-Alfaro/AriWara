<?php
	
	global $lumise;

	$section = 'template';
	$id = isset($_GET['id']) ? $_GET['id'] : 0;
	$fields = $lumise_admin->process_data(array(
		array(
			'type' => 'input',
			'name' => 'name',
			'label' => $lumise->lang('Nombre'),
			'required' => true,
			'default' => 'Pantilla 1'
		),
		array(
			'type' => 'input',
			'name' => 'price',
			'label' => $lumise->lang('Precio'),
			'default' => 0,
			'numberic' => 'float',
			'desc' => $lumise->lang('Ingrese precio para esta plantilla.')
		),
		array(
			'type' => 'categories',
			'cate_type' => 'templates',
			'name' => 'categories',
			'label' => $lumise->lang('Categorias'),
			'id' => $id,
			'db' => false
		),
		array(
			'type' => 'tags',
			'tag_type' => 'templates',
			'name' => 'tags',
			'label' => $lumise->lang('Etiquetas'),
			'id' => $id,
			'db' => false,
			'desc' => $lumise->lang('Ejemplo: Carros, Gatos, Perro ...'),
		),
		array(
			'type' => 'upload',
			'file' => 'design',
			'name' => 'upload',
			'path' => 'templates'.DS.date('Y').DS.date('m').DS,
			'thumbn' => 'screenshot',
			'label' => $lumise->lang('Subir Imagen de plantilla'),
			'desc' => $lumise->lang('Cargue el archivo exportado ')
			/**.lumi from the Lumise Designer Tool. You can download the LUMI file via menu "File" > Save As File, or press Ctrl+Shift+S*/
		),
		array(
			'type' => 'toggle',
			'name' => 'featured',
			'label' => $lumise->lang('Destacados'),
			'default' => 'no',
			'value' => null
		),
		array(
			'type' => 'toggle',
			'name' => 'active',
			'label' => $lumise->lang('Activo'),
			'default' => 'yes',
			'value' => null
		),
		array(
			'type' => 'input',
			'name' => 'order',
			'type_input' => 'number',
			'label' => $lumise->lang('Ordenes'),
			'default' => 0,
			'desc' => $lumise->lang('Pedido de artículo con otro.')
		),
	), 'templates');

?>

<div class="lumise_wrapper" id="lumise-<?php echo $section; ?>-page">
	<div class="lumise_content">
		<?php
			$lumise->views->detail_header(array(
				'add' => $lumise->lang('Add new template'),
				'edit' => $fields[0]['value'],
				'page' => $section
			));
		?>
		<form action="<?php echo $lumise_router->getURI(); ?>lumise-page=<?php
			echo $section.(isset($_GET['callback']) ? '&callback='.$_GET['callback'] : '');
		?>" id="lumise-<?php echo $section; ?>-form" method="post" class="lumise_form" enctype="multipart/form-data">

			<?php $lumise->views->tabs_render($fields); ?>

			<div class="lumise_form_group lumise_form_submit">
				<input type="submit" value="<?php echo $lumise->lang('Save Template'); ?>"/>
				<input type="hidden" name="do" value="action" />
				<a class="lumise_cancel" href="<?php echo $lumise_router->getURI();?>lumise-page=templates">
					<?php echo $lumise->lang('Cancel'); ?>
				</a>
				<input type="hidden" name="lumise-section" value="<?php echo $section; ?>">
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">
	
	var lumise_upload_url = '<?php echo $lumise->cfg->upload_url; ?>',
		lumise_assets_url = '<?php echo $lumise->cfg->assets_url; ?>';
			
	document.lumiseconfig = {
		main: 'template'
	};
</script>
