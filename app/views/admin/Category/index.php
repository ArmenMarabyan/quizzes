<?php include APP . '/views/admin/layouts/admin_header.php'; ?>

<a href="category/create" class="btn btn-primary float-right" style="margin-bottom: 20px;"><i class="fa fa-plus square-o"></i>Создать категорию</a>	

		<table class="table table-bordered" >
		  <thead>
		    <tr class="text-center">
		      <th scope="col">id</th>
		      <th scope="col">Название</th>
		      <th scope="col" class="text-right">Действие</th>
		    </tr>
		  </thead>
			<tbody>
	    
	    	<?php foreach ($categories as $category): ?>
				<tr class="text-center align-middle">
					<th scope="row"><?= $category->id ?></th>
				    <td >
				    	<a href=""><?= $category->title ?></a>
				    </td>

				    <td class="text-right">

					    <form action="/admin/news/delete/ ?>" onsubmit="if(confirm('Удалить тест?')){return true}else{return false}" method="post">
					    	<input type="hidden" name="_method" value="DELETE">
					    	
							<a href="/admin/news/edit/" class="btn btn-default"><i class="fa fa-edit"></i></a>
					    	<button type="submit" class="btn"><i class="fas fa-trash-alt"></i></i></button>
					    </form>

				    	

				    </td>
				</tr>
	    	<?php endforeach ?>


	  </tbody>
	  <tfoot>
	  	<tr>
	  		<td>
	  			<?php if (count($categories) == 0): ?>
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