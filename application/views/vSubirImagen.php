<!DOCTYPE html>
<html>
<head>
	<?php
	echo $head;
	?>
</head>
<body>
	<div id="contenedor">
		<div id="cabecera">
			<?
			echo $cabecera;
			?>
		</div>
		<div id="enlaces">
			<?
			echo $enlaces;
			?>
		</div>
		<div id="contenido">
			<?
			echo $contenido;
			?>
			<br/>
			<?= form_open_multipart(base_url()."index.php/Upload/do_upload")?>
			<label>Usuario</label>
			<select name="cboCampo" id="cboCampo">
				<option value="" selected="selected"></option>
				<?
				foreach ($campos->result() as $campo)
				{
					echo "<option value='$campo->usuario'>". ucwords($campo->usuario) ."</option>";
				}
				?>
			</select>
			<br/>
			<label>Título</label>
			<input type="text" name="txtTitulo" id="txtTitulo" />
			<br/>
			<label>Imagen</label>
			<input type="file" name="userfile" id="userfile"/>
			<br/>
			<input type="submit" value="Subir imagen"/>
			<input type="reset" value="Restablecer"/>


			<?= form_close() ?>


			<div id="error">
				<? echo validation_errors(); ?>
			</div>
		</div>
		<div id="pie">
			<?
			echo $pie;
			?>
		</div>
	</div>
</body>
</html>
