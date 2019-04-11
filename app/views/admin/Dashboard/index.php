<?php include APP . '/views/admin/layouts/admin_header.php'; ?>
	<div class="row">
		<div class="col-lg-6">
			<div class="jumbotron">
				<p style="text-align: center; font-size: 20px;"><span class="badge badge-primary">Тесты: <?= $testsCount ?> </span></p>
			</div>
		</div>

		<div class="col-lg-6">
			<div class="jumbotron">
				<p style="text-align: center; font-size: 20px;"><span class="badge badge-primary">Категории: <?= $testsCount ?> </span></p>
			</div>
		</div>
		
	</div>

	<div class="row">
		<div class="col-lg-6">
			<a href="tests/create" class="btn btn-secondary btn-lg btn-block">Добавить тест</a>
			<?php foreach ($tests as $test): ?>
				<a href="" class="list-group-item list-group-item-action list-group-item-light"><?= $test['title'] ?>
				<span class="badge badge-primary float-right"><?= $testsCount ?> </span></a>
			<?php endforeach ?>
		</div>

		<div class="col-lg-6">
			<a href="tests/create" class="btn btn-secondary btn-lg btn-block">Добавить категорию</a>
			<?php foreach ($categories as $category): ?>
				<a href="" class="list-group-item list-group-item-action list-group-item-light"><?= $category['title'] ?>
				<span class="badge badge-primary float-right"><?= $categoriesCount ?> </span></a>
			<?php endforeach ?>
		</div>
	</div>

<?php include APP . '/views/admin/layouts/admin_footer.php'; ?>