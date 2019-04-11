<?php include APP . '/views/admin/layouts/admin_header.php'; ?>

    <?php if(isset($_SESSION['error'])): ?>
	    <div class="alert alert-danger">
	        <?=$_SESSION['error']; unset($_SESSION['error'])?>
	    </div>
	<?php endif; ?>

	<?php if(isset($_SESSION['success'])): ?>
	    <div class="alert alert-success">
	        <?=$_SESSION['success']; unset($_SESSION['success'])?>
	    </div>
	<?php endif; ?>
	<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" >
		<div class="row">
			<div class="col-lg-6">
				<div class="form-group">
					<label for="">Название категории</label>
					<input type="text" class="form-control" name="title" placeholder="Название категории" value="<?=isset($_SESSION['form_data']['title']) ? $_SESSION['form_data']['title']: '';?>">
				</div>
			</div>
		</div>
		<input type="submit" name="submit" class="btn btn-primary" value="Сохранить">

	</form>

<?php include APP . '/views/admin/layouts/admin_footer.php'; ?>