<div class="content__header">
    <div class="content__header-info">
        <h1>Online Test Series & Free Mock Tests For Competitive Exams</h1>
        <p>Boost your exam preparation with Testbook to crack the most popular competitive exams in India. Select your exam and get started.</p>
    </div>
    <div class="content__header-btns">
         <a href="javascript:void(0);" data-id="0" type="button" class="btn btn-outline-secondary catBtn">Все тесты</a>
        <?php foreach ($categories as $category): ?>
            <a href="javascript:void(0);" data-id="<?= $category->id ?>" type="button" class="btn btn-outline-secondary catBtn"><?= $category->title ?></a>
        <?php endforeach ?>
    </div>
</div>
<div class="content__quizzes">
    <div class="row">
        <?php foreach ($tests as $test): ?>
            <section class="col-lg-4 content__quizzes-block">
                
                    <div class="block__inner">
                        <div class="block__inner-image">
                            <?php if (!$test->image): ?>
                                <img src="/public/assets/images/noImage/no-image.png" alt="">
                                <?php else: ?>
                                <img src="/public/assets/images/<?= $test->image ?>" alt="">
                            <?php endif ?>
                            
                        </div>
                        <div class="block__inner-title">
                            <h4><?= $test->title ?></h4>
                        </div>
                        <p class="block__inner-description">
                            <?php if (strlen($test->description) > 200): ?>
                                <?= mb_substr( $test->description, 0, 200 ) ?>...<span class="popup"><i class="fas fa-info-circle"></i></span>
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

    </div>
</div>

<script>
    $(document).ready(function() {
        $('.catBtn').on('click', function(e) {
            e.preventDefault();
            var catId = $(this).attr('data-id');


            $.ajax({
                url: 'main/index',
                type: 'post',
                data: {'id': catId},
                beforeSend: function() {
                    $('.content__quizzes .row').html('<div style="margin: 0 auto;"><img src="/public/assets/images/preloader.gif" alt=""></div>')
                },
                success: function(res) {
                    $('.content__quizzes .row').html(res)
                },
                error: function() {
                    alert('error')
                }
            })
        })
    })

</script>

