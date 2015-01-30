<script type="text/javascript">
/* Events 
------------------------------------------------------ */
$(document).on('unsynchronized', function(event){
	$('.auth_error').fadeOut('fast');
	$('#content-wrap').load('user #content-wrap .row');
});
</script>

<div id="content-wrap">
	<div class="row">
		<div class="eight columns">
			<h1>Perfil de Colaborador</h1>
		<div>
	<?php if ($this->facebook->isConnected()) : ?>
			<?php if (!$isColaborador) : ?>
			<div class="alert alert-warning" role="alert">Por el momento
					necesitas un token de acceso para registrarte como colaborador del
					colectivo.
			</div>
			<?php endif; ?>
			<p>Bienvenido <b><?= $name ?> </b>  
			</p>
			<form action="<?= base_url ()?>user" method="POST">
				<input type="hidden" name="name" value="<?= $name ?>">
				<input type="hidden" name="facebook_id" value="<?= $facebook_id ?>">
				<div class="form-group <?=  form_error('username')!=''?'has-error':''; ?>">
					<label  class="control-label" for="username">Usuario</label> 
					<input class="form-control" type="text"  id="username"
						name="username"
						value="<?= set_value('username',$username) ?>" >
					<?= form_error('username') ?>
				</div>
				<div class="form-group">
    				<label for="email">Email</label>
    				<input name="email" type="email" class="form-control" id="email" value="<?= $email ?>">
  				</div>
  				<div class="form-group">
    				<label for="profile">Perfil</label>
    				<input name="profile"
    				placeholder="Describe tu rol o lo que haces en la organizacion."
    				type="text" class="form-control" id="profile" value="<?= $profile ?>">
  				</div>
  				<div class="form-group">
    				<label for="about">Acerca de mi</label>
    				<textarea name="about" rows="2" class="form-control" 
    					placeholder="Escribe un poco sobre ti."><?= $about ?></textarea>
  				</div>
  				<div class="form-group">
    				<label for="token">Token</label>
    				<input name="token"
    					class="form-control"
    					placeholder="Ingresa el token de registro">
  				</div>
  				<button type="submit" class="btn btn-default">Actualizar</button>
				</form>
		
	<?php else: ?>
		<div class="alert alert-danger auth_error" role="alert">Necesitas iniciar session
					como colaborador. Da click en el boton 'COLABORADOR'. 
					<?php echo $this->facebook->session_ex->getMessage().$this->facebook->session_ex->getCode() ?>
		</div>
	<?php endif; ?>
		</div>
		</div>
	</div>
</div>