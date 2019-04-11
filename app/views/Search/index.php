<?php if (isset($tests) && count($tests) > 0): ?>
	<div class="row">
	<div class="col-lg-10 mx-auto">
		<div class="search__block">
			<form action="/search" method="GET" role="search">
                <input type="text" name="q" placeholder="Поиск..">
                <button type="submit" class="search__btn"><i class="fa fa-search"></i></button>
            </form>
		</div>
	</div>
</div>
	<div class="content__quizzes list qBlock">
		<nav aria-label="breadcrumb">
		  	<ol class="breadcrumb">
		    	<li class="breadcrumb-item"><a href="/">Главная</a></li>
		    	<li class="breadcrumb-item active" aria-current="page">Тесты</li>
		  	</ol>
		</nav>
	    <div class="row">
	        <?php foreach ($tests as $test): ?>
	            <section class="col-lg-12 content__quizzes-list">
	                    <div class="list__inner">

	                        <div class="row">

	                        	<div class="col-lg-2">
	                        		<div class="list__inner-image">
			                            <?php if (!$test->image): ?>
			                                <img src="/public/assets/images/noImage/no-image.png" alt="">
			                                <?php else: ?>
			                                <img src="/public/assets/images/<?= $test->image ?>" alt="">
			                            <?php endif ?>
			                        </div>

	                        	</div>

	                        	<div class="col-lg-10">
	                        		<div class="list__inner-title">
			                            <h4><?= str_replace($query, '<strong style="background-color: #FFFF00;">'.$query.'</strong>', $test->title); ?></h4>
			                        </div>

	                        		<p class="list__inner-description">
			                        	<?= str_replace($query, '<strong style="background-color: #FFFF00;">'.$query.'</strong>', $test->description); ?>
			                        </p>
			                        <div class="list__inner-stats">
		                            <ul>
		                                <li>
		                                	<span class="stats__info">Прошли тест:</span>
		                                    <span class="stats__num"><?= $test->passed ?> человека</span>
		                                </li>
		                                <li>
		                                	<span class="stats__info">Средний балл</span>
		                                    <span class="stats__num"><?= $test->score ?> из 5 баллов</span>
		                                </li>
		                            </ul>
		                        </div>
	                        	</div>
	                        	<a href="/tests/<?= $test->alias ?>" class="startBtn">Пройти тест</a>
	                        </div>
	                    </div>
	                
	            </section>
	        <?php endforeach ?>

	        <?= $pagination ?>

	    </div>
	</div>
	<?php else: ?>
		<div class="col-lg-12">
			<div class="alert alert-secondary text-center" role="alert">
			  	<i class="fas fa-info-circle"></i> &nbsp; По запросу - <strong><?= $query ?></strong> ничего не найдено!
			</div>
		</div>
<?php endif ?>