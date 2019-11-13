<?php
	global $lumise;

	$section = 'tag';
	$type = isset($_GET['type']) ? $_GET['type'] : '';
	$fields = $lumise_admin->process_data(array(
		array(
			'type' => 'input',
			'name' => 'name',
			'label' => $lumise->lang('Nombre'),
			'required' => true
		),
		array(
			'type' => 'input',
			'type_input' => 'hidden',
			'name' => 'type',
			'default' => $type,
		)
	), 'tags');

?>

<div class="lumise_wrapper" id="lumise-<?php echo $section; ?>-page">
	<div class="lumise_content">
		<?php
			$lumise->views->detail_header(array(
				'add' => $lumise->lang('Añadir nueva etiqueta'),
				'edit' => $lumise->lang('Editar etiqueta'),
				'page' => $section,
				'type' => $type
			));
		?>
		<form action="<?php echo $lumise_router->getURI(); ?>lumise-page=<?php
			echo $section.(isset($_GET['callback']) ? '&callback='.$_GET['callback'] : '');
		?>" id="lumise-clipart-form" method="post" class="lumise_form" enctype="multipart/form-data">

			<?php $lumise->views->tabs_render($fields); ?>

			<div class="lumise_form_group lumise_form_submit">
				<input type="submit" value="<?php echo $lumise->lang('Guardar etiqueta'); ?>"/>
				<input type="hidden" name="do" value="action" />
				<a class="lumise_cancel" href="<?php echo $lumise_router->getURI();?>lumise-page=<?php echo $section; ?>s&type=<?php echo $type; ?>">
					<?php echo $lumise->lang('Cancelar'); ?>
				</a>
				<input type="hidden" name="do" value="action">
				<input type="hidden" name="lumise-section" value="<?php echo $section; ?>">
			</div>
		</form>
	</div>
</div>
