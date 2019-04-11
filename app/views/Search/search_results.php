<?php if (count($tests) > 0): ?>
	
	<?php foreach ($tests as $test): ?>
		<a href="/tests/<?= $test->alias ?>">
			<div class="search__results-block">
				<div class="search__resultsBlock-image">
					<img src="/public/assets/images/<?= $test->image ?>" alt="">
				</div>
				<div class="search__resultsBlock-info">
					<h2><?= $test->title ?></h2>
					<p><?= mb_substr($test->description, 0, 90) ?>...</p>
				</div>
			</div>
            
		</a>
	<?php endforeach ?>
	<?php if (count($tests) > 10): ?>
		<button type="submit" class="allResultsBtn">Посмотреть все результаты</button>
	<?php endif ?>
	
	<?php else: ?>
		<div class="noResults">
			<p>По вашему запросу ничего не найдено</p>
		</div>
<?php endif ?>
