<header id="cabecario">
	<div class="container">
		<div class="row">
			
			<div class="col-sm-6 col-md-8">
				<center>
					<h1><span class="nanuvem-logo"></span></h1>
					<small><h2>Bem vindo ao céu!</h2></small>
				</center>
			</div>
			
			<div class="col-sm-6 col-md-4">
				<?php if(isset($usuario_logado)): ?>
					<h2>Ola, <?php echo $usuario_logado->nome ?></h2>
					<p>Trocar usuário
					<a class="btn btn-default" href="<?php echo site_url('page/sair') ?>"><span class="glyphicon glyphicon-off"></span> Sair</a>
					</p>
				<?php else: ?>
					<form method="POST">
						<?php if (validation_errors() != ""): ?>
							<div class="alert alert-danger alert-dismissible fade in" role="alert">
						      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
						      <strong><?php echo validation_errors() ?></strong>
						    </div>
						<?php endif ?>
						<div class="form-group">
							<label for="email">E-mail</label>
							<input type="text" name="email" id="email" class="form-control" value="<?php echo set_value('email') ?>"> 
						</div>

						<div class="form-group">
							<label for="password">Senha</label>
							<input type="password" name="password" id="password" class="form-control" > 
						</div>

						<center>
							<button class="btn btn-primary">Entrar</button>
							<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">Cadastrar-se</button>
						</center>
					</form>
				<?php endif ?>
			</div>
		</div>
	</div>
</header>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        		<h4 class="modal-title" id="myModalLabel">Cadastro</h4>
      		</div>
      		<div class="modal-body">
      			<form class="from horizontal">
      				<div class="form-group">
						<label for="email">E-mail</label>
						<input type="text" name="email" id="email" class="form-control" > 
					</div>

					<div class="form-group">
						<label for="password">Senha</label>
						<input type="password" name="password" id="password" class="form-control" > 
					</div>

					<div class="form-group">
						<label for="repetir-password">Repetir Senha</label>
						<input type="password" name="repetir-password" id="repetir-password" class="form-control" > 
					</div>
      			</form>
     		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        		<button type="button" class="btn btn-primary">Save changes</button>
      		</div>
    	</div>
  	</div>
</div>
