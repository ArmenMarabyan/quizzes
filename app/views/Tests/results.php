<?php if(isset($_SESSION['questions'])): ?>
	<div class="row">
		<div class="col-lg-12">
			<div class="results qBlock">
				<h1>Результаты теста по <?= $test->title ?></h1>
				<div class="quiz__results">
					<div class="row">
						<div class="col-lg-4 quiz__results-left">
							<p>Ваш результат:</p>
							<p class="quiz__percents"><?= round(($correctAnswCount / count($_SESSION['questions']) * 100)) ?>%</p>
							<p><?= $correctAnswCount ?> из <?= count($_SESSION['questions']) ?></p>
						</div>
						<div class="col-lg-4 quiz__results-center">
							<div class="progress-bar">
							    <div class="barOverflow">
							        <div class="bar"></div>
							    </div>
								<span><?= round(($correctAnswCount / count($_SESSION['questions']) * 100)) ?></span>
							</div>
						</div>
						<div class="col-lg-4 quiz__results-right">
							<p>Ваша оценка <br> (5-ти бальная шкала):</p>
							<p class="quiz__percents">
								<?= round(($correctAnswCount / count($_SESSION['questions']) * 100) * 5 / 100);
					      		?>
							</p>
						</div>
					</div>
				</div>
				
				
				<?php foreach($questions as $k=>$v): ?>

					<div class="quiz__question qBlock">
			            <h2>Вопрос <?= $k ?>:</h2>
			            <p class="question">
			                <?= $questions[$k]->q_title; ?>
			            </p>
			        </div>
					<?php 
						$correctAnswer = 'variant_' . $questions[$k]->correct;
						$correctAnswer = $questions[$k]->$correctAnswer;

						$wrongAnswer = 'variant_' . $_SESSION['questions'][$k];
						$wrongAnswer = $questions[$k]->$wrongAnswer;
					?>
					<?php if($_SESSION['questions'][$k] === $questions[$k]->correct): ?>
						<div class="results__table">
							<table class="table table-bordered">
							  	<tbody>
							    	<tr class="table-success">
								      	<th scope="row" style="width: 200px;"><i class="fa fa-check"></i>  Вы выбрали:</th>
								      	<td><?= $correctAnswer ?></td>
							    	</tr>
							    	<tr class="table-success">
							      		<th scope="row" style="width: 200px;"></i> Правильный ответ:</th>
							      		<td><?= $correctAnswer ?></td>
							    	</tr>
							  	</tbody>
							</table>
						</div>
					<?php else:?>
						<div class="results__table">
							<table class="table table-bordered">
							  	<tbody>
							    	<tr class="table-danger">
								      	<th scope="row" style="width: 200px;"><i class="fa fa-times"></i>  Вы выбрали:</th>
								      	<td><?= $wrongAnswer ?></td>
							    	</tr>
							    	<tr class="table-secondary">
							      		<th scope="row" style="width: 200px;"><i class="fa fa-check"></i> Правильный ответ:</th>
							      		<td><?= $correctAnswer ?></td>
							    	</tr>
							  	</tbody>
							</table>
						</div>
						
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</div>
	</div>

	<script>
		$(".progress-bar").each(function(){
			var bar = $(this).find(".bar");
			var val = $(this).find("span");
			var per = parseInt( val.text(), 10);
			var $right = $('.right');
			var $back = $('.back');

			$({p:0}).animate({p:per}, {
				duration: 3000,
				step: function(p) {
					bar.css({
						transform: "rotate("+ (45+(p*1.8)) +"deg)"
					});
					val.text(p|0);
				}
			}).delay( 200 );

			if (per == 100) {
				$back.delay( 2600 ).animate({'top': '18px'}, 200 );
			}

			if (per == 0) {
				$('.left').css('background', 'gray');
			}
		});
	</script>

<?php endif; ?>

