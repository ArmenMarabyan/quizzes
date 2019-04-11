
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="quiz qBlock">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Главная</a></li>
                        <li class="breadcrumb-item"><a href="/tests">Тесты</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $test->title ?></li>
                    </ol>
                </nav>
                <a href="http://vk.com/share.php?url=[http://localhost/tests/php]&title=[Test]&description=[opisanie]&image=[http://www.racsonline.com/wp-content/uploads/2015/10/1123676.jpg]&noparse=true">VK</a>
                <?php if (count($questions) > 0): ?>
                    <div class="quiz__question qBlock">

                        <div class="quiz__list">
                            <ul>
                                <?php for($i = 0; $i < count($questions); $i++): ?>
                                    <li <?php if($i+1 == $currentAnswer) echo 'class="quiz__list-item item__active"' ?>><?= $i+1 ?></li>
                                <?php endfor; ?>
                            </ul>
                        </div>
                        <h3>Question <?= $currentAnswer ?> of <?= count($questions) ?><span><?=$test->title?></span></h3>
                        
                        <p class="question">
                            <?=$question->q_title?>
                        </p>
                    </div>
                    <div class="quiz__answers">
                        <form action="" method="post">
                            <div class="radio">
                                <label for="variant_1" class="qBlock">
                                    <span class="answer__dec">1</span>
                                    <input type="radio" id="variant_1" name="variant" value="1">
                                    <?=$question->variant_1?>
                                </label>
                            </div>
                            <div class="radio ">
                                <label for="variant_2" class="qBlock">
                                    <span class="answer__dec">2</span>
                                    <input type="radio" id="variant_2" name="variant" value="2">
                                    <?=$question->variant_2?>
                                </label>
                            </div>
                            <div class="radio ">
                                <label for="variant_3" class="qBlock">
                                    <span class="answer__dec">3</span>
                                    <input type="radio" id="variant_3" name="variant" value="3">
                                    <?=$question->variant_3?>
                                </label>
                            </div>
                            <div class="radio ">
                                <label for="variant_4" class="qBlock">
                                    <span class="answer__dec">4</span>
                                    <input type="radio" id="variant_4" name="variant" value="4">
                                    <?=$question->variant_4?>
                                </label>
                            </div>
                            <input type="hidden" name="test_id" value="<?=$question->id?>">

                            <input type="submit" name="submit" class="btn btn-success" value="Otvet">
                        </form>

                    </div>
                <?php else: ?>
                    <div class="col-lg-12">
                        <div class="alert alert-secondary text-center" role="alert">
                            Здесь пока пусто!
                        </div>
                    </div>
                <?php endif; ?>
            </div>

        </div>

    </div>
