<?php if (count($tests) > 0): ?>
	<?php foreach ($tests as $test): ?>
		<section class="col-lg-4 content__quizzes-block">

			<div class="block__inner">
				<div class="block__inner-image">
					<img src="https://cdn.iconscout.com/icon/free/png-256/php-28-226043.png" alt="">
				</div>
				<div class="block__inner-title">
					<h4><?= $test->title ?></h4>
				</div>
				<p class="block__inner-description">
				<?php if (strlen($test->description) > 200): ?>
					<?= mb_substr( $test->description, 0, 200 ) ?>...
					<span class="popupText">
						<?= $test->description ?>
					</span>
					<?php else: ?>
						<?= $test->description ?>
					<?php endif ?>

				</p>
				<div class="block__inner-stats">
					<ul class="d-flex">
						<li>
							<span class="stats__num"><?= $test->passed ?></span>
							<span class="stats__info">Прошли тест:</span>
						</li>
						<li>
							<span class="stats__num"><?= $test->score ?></span>
							<span class="stats__info">Средний балл</span>
						</li>
					</ul>
				</div>
				<a href="/tests/<?= $test->alias ?>" class="startBtn">Пройти тест</a>
			</div>

		</section>
	<?php endforeach ?>
	<?php else: ?>
		<div class="col-lg-12">
			<div class="alert alert-secondary text-center" role="alert">
			  	Здесь пока пусто!
			</div>
		</div>
<?php endif ?>