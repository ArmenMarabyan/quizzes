<?php include APP . '/views/admin/layouts/admin_header.php'; ?>

<a href="tests/create" class="btn btn-primary float-right" style="margin-bottom: 20px;"><i class="fa fa-plus square-o"></i>Создать тест</a>	

		<table class="table table-bordered" >
		  <thead>
		    <tr class="text-center">
		      <th scope="col">id</th>
		      <th scope="col">Картинка теста</th>
		      <th scope="col">Название</th>
		      <th scope="col">Полное описание</th>
		      <th scope="col" class="text-right">Действие</th>
		    </tr>
		  </thead>
			<tbody>
	    
	    	<?php foreach ($tests as $test): ?>
				<tr class="text-center align-middle">
					<th scope="row"><?= $test->id ?></th>
				    <td>
				    	<div class="admin__item-image">
				    		<img src="/public/assets/images/<?= $test->image ?>" alt="">
				    	</div>
				    </td>
				    <td >
				    	<a href=""><?= $test->title ?></a>
				    </td>
				    <td>
						<div class="admin__item-desc">
				    		<span><?= $test->description ?>...</span>
				    	</div>
				    </td>

				    <td class="text-right">

				    <form action="/admin/tests/delete/<?= $test->id ?>" onsubmit="if(confirm('Удалить тест?')){return true}else{return false}" method="post">
				    	<input type="hidden" name="_method" value="DELETE">
				    	
						<a href="/admin/tests/edit/<?= $test->id ?>" class="btn btn-default"><i class="fa fa-edit"></i></a>
				    	<button type="submit" class="btn"><i class="fas fa-trash-alt"></i></i></button>
				    </form>

				    	

				    </td>
				</tr>
	    	<?php endforeach ?>


	  </tbody>
	  <tfoot>
	  	<tr>
	  		<td>
	  			<?php if (count($tests) == 0): ?>
	  				<div class="col-lg-12">
						<h3 class="alert alert-light" style="text-align: center;">Данные отсутсвуют</h3>
					</div>
	  			<?php endif ?>
	  				
	  		</td>
	  	</tr>
	  </tfoot>
	</table>

	<div class="float-right">
		<?= $pagination ?>
	</div>

<?php include APP . '/views/admin/layouts/admin_footer.php'; ?>