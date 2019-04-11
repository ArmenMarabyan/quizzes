<div class="row">
    <div class="col-lg-10 mx-auto">
        <div class="feedback qBlock">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/quizzes">Главная</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Обратная связь</li>
                </ol>
            </nav>

			<div class="row">

				<div class="col-lg-12">
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
						<div class="feedback__form">
							
						  	<div class="form-group row">
						    	<label for="inp_email" class="col-sm-2 col-lg-4 col-form-label">Email</label>
						    	<div class="col-sm-10 col-lg-8">
						     	 <input type="text" class="form-control" name="email" id="inp_email" placeholder="email" value="<?= $formData['email'] ?>">
						    	</div>
						  	</div>
							<div class="form-group row">
							    <label for="inp_name" class="col-sm-2 col-lg-4 col-form-label">Имя</label>
							    <div class="col-sm-10 col-lg-8">
							      	<input type="text" class="form-control" name="name" id="inp_name" placeholder="Имя" value="<?= $formData['name'] ?>">
							    </div>
							</div>
		                    <div class="form-group row">
		                        <label for="txt_comm" class="col-sm-2 col-lg-4 col-form-label"> Сообщение </label>
		                        <div class="col-sm-10 col-lg-8">
		                            <textarea class="form-control" placeholder="Вы можете уведомить нас, если нашли  баг или отправить нам свои советы и жалобы написав здесь" name="message" id="txt_comm" rows="3"><?= $formData['message'] ?></textarea>
		                        </div>
		                    </div>

							<div class="feedback__btn">
								<input type="submit" name="submit" class="btn btn-primary" role="button" value="Отправить">
							</div>

						</div>
					</form>
				</div>
			</div>

            
        </div>

    </div>

</div>
