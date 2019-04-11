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
	<form class="form-horizontal" action="" method="post" >
		<div class="row">
			<div class="col-lg-12">
				<div class="form-group">
					<label for="">Вопрос</label>
					<input type="text" class="form-control" name="q_title" placeholder="Заголовок теста" value="<?=isset($_SESSION['form_data']['q_title']) ? $_SESSION['form_data']['q_title']: '';?>">
				</div>

				<div class="form-group">
					<label for="">Тест</label>
					<select name="test_id" class="form-control" id="">
						<?php foreach ($tests as $test): ?>
							<option value="<?= $test->id ?>"><?= $test->title ?></option>
						<?php endforeach ?>
					</select>
				</div>

				<div class="form-group">
					<label for="">Правильный ответ</label>
					<select name="correct" class="form-control" id="">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
				</div>
				<div class="row">

						<div class="form-group col-lg-6">
							<label for="">Ответ 1</label>
							<input type="text" class="form-control" name="variant_1" placeholder="" value="<?=isset($_SESSION['form_data']['variant_1']) ? $_SESSION['form_data']['variant_1']: '';?>">
						</div>

						<div class="form-group col-lg-6">
							<label for="">Ответ 2</label>
							<input type="text" class="form-control" name="variant_2" placeholder="" value="<?=isset($_SESSION['form_data']['variant_2']) ? $_SESSION['form_data']['variant_2']: '';?>">
						</div>
						<div class="form-group col-lg-6">
							<label for="">Ответ 3</label>
							<input type="text" class="form-control" name="variant_3" placeholder="" value="<?=isset($_SESSION['form_data']['variant_3']) ? $_SESSION['form_data']['variant_3']: '';?>">
						</div>
						<div class="form-group col-lg-6">
							<label for="">Ответ 4</label>
							<input type="text" class="form-control" name="variant_4" placeholder="" value="<?=isset($_SESSION['form_data']['variant4']) ? $_SESSION['form_data']['variant4']: '';?>">
						</div>
				</div>
			</div>
			

		</div>
		<input type="submit" name="submit" class="btn btn-primary" value="Сохранить">

	</form>

<?php include APP . '/views/admin/layouts/admin_footer.php'; ?>