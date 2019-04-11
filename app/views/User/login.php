<div class="row">
    <div class="col-lg-10 mx-auto">
        <div class="login qBlock">
            <h2>Авторизация</h2>

            <div class="row">

                <div class="col-lg-6 mx-auto">
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
                    <form action="" method="post">
                        <div class="login__form">
                            
                            <div class="form-group">
                                <label for="login">Логин или Email</label>
                                <input type="text" name="login" class="form-control" id="login" placeholder="Логин или Email" value="<?=isset($_SESSION['form_data']['login']) ? $_SESSION['form_data']['login']: '';?>">
                            </div>
                            <div class="form-group">
                                <label for="password">Пароль</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Пароль" value="<?=isset($_SESSION['form_data']['password']) ? $_SESSION['form_data']['password']: '';?>">
                            </div>

                            <div class="login__btn">
                                <button type="submit" name="auth" class="btn btn-primary">Вход</button>
                                <a href="/user/register" class="float-right">Создать аккаунт</a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>






<!-- Модальное окно -->

<!-- <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Авторизация</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
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
                <form action="" method="post">
                    <div class="login__form">


                        <div class="form-group">
                            <label for="login">Login or Email</label>
                            <input type="text" name="login" class="form-control" id="login" placeholder="Login" value="<?=isset($_SESSION['form_data']['login']) ? $_SESSION['form_data']['login']: '';?>">
                        </div>
                        <div class="form-group">
                            <label for="password">password</label>
                            <input type="password" name="password" class="form-control" id="password" value="<?=isset($_SESSION['form_data']['password']) ? $_SESSION['form_data']['password']: '';?>">                

                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <input type="submit" name="auth" class="btn btn-success" role="button" value="Login">
                        </div>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>
 -->