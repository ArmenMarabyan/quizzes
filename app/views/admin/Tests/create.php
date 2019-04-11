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
					<label for="">Название Теста</label>
					<input type="text" class="form-control" name="title" placeholder="Заголовок теста" value="<?=isset($_SESSION['form_data']['title']) ? $_SESSION['form_data']['title']: '';?>">
				</div>

				<div class="form-group">
					<label for="">Alias</label>
				  	<input type="text" class="form-control" name="alias" placeholder="Alias" value="<?=isset($_SESSION['form_data']['alias']) ? $_SESSION['form_data']['alias']: '';?>">
				</div>

				<div class="form-group">
					<label for="description">Полное описание Теста</label>
					<textarea class="form-control" id="description" name="description"><?=isset($_SESSION['form_data']['description']) ? $_SESSION['form_data']['description']: '';?></textarea>
				</div>


				<div class="form-group">
					<label for="">Категория</label>
					<select name="category_id" class="form-control" id="">
						<?php foreach ($categories as $category): ?>
							<option value="<?= $category->id ?>"><?= $category->title ?></option>
						<?php endforeach ?>
						
					</select>
				</div>

				<div class="row">

					<div class="form-group col-lg-3">
						<label for="">Мета заголовок</label>
						<input type="text" class="form-control" name="meta_title" placeholder="Мета заголовок" value="">
					</div>

					<div class="form-group col-lg-3">
						<label for="">Мета описание</label>
						<input type="text" class="form-control" name="meta_description" placeholder="Мета описание" value="">
					</div>

					<div class="form-group col-lg-5">
						<label for="">Ключевые слова</label>
						<input type="text" class="form-control" name="meta_keyword" placeholder="Ключевые слова" value="">
					</div>
				</div>
			</div>
		</div>

		<div class="form-group">
			<label for="">Картинки</label>
			<input type="file" name="files" id= "files" class="filestyle image" data-buttonText="asdasd" data-classButton="btn btn-primary">
		</div>

		<div id="list"></div>
		<input type="submit" name="submit" class="btn btn-primary" value="Сохранить">
		<div id = "div" class="d-flex"></div>

	</form>

<?php include APP . '/views/admin/layouts/admin_footer.php'; ?>