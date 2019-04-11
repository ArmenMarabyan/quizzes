<div class="row">
    <div class="col-lg-10 mx-auto">
        <div class="register qBlock">
            <h2>Регистрация</h2>

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
                    <form method="post" action="">
                        <div class="register__form">
                            <div class="form-group">
                                <label for="login">Логин</label>
                                <input type="text" name="login" class="form-control" id="login" placeholder="Login" value="<?=isset($_SESSION['form_data']['login']) ? $_SESSION['form_data']['login']: '';?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control" id="email" placeholder="Email" value="<?=isset($_SESSION['form_data']['email']) ? $_SESSION['form_data']['email']: '';?>">
                            </div>
                            <div class="form-group">
                                <label for="password">Пароль</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Пароль" value="<?=isset($_SESSION['form_data']['password']) ? $_SESSION['form_data']['password']: '';?>">
                            </div>
                            <div class="form-group">
                                <label for="password_confirm">Повторите пароль</label>
                                <input type="password" name="password_confirm" class="form-control" id="password_confirm" placeholder="Повторите пароль" value="<?=isset($_SESSION['form_data']['password_confirm']) ? $_SESSION['form_data']['password_confirm']: '';?>">
                            </div>
                            
                            <div class="login__btn">
                                <button type="submit" name="register" class="btn btn-primary">Регистрация</button>
                                <a href="/user/login" class="float-right">Есть аккаунт?</a>
                            </div>
                        </div>
                        
                        
                    </form>
                    <?php
                        if(isset($_SESSION['form_data'])) {
                            unset($_SESSION['form_data']);
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>