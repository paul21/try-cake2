<div class="container" style="margin-top:30px">
	<div class="col-md-12">
		<div class="modal-dialog" style="margin-bottom:0">
			<div class="modal-content">
				<div class="panel-heading">
					<h3 class="panel-title">Sign In</h3>
				</div>
				<div class="panel-body">
					<?php echo $this->Form->create('User', array('role' => 'form', 'class' => 'users form')); ?>
					<!-- form role="form" -->
					<?php echo $this->Flash->render('auth'); ?>
					<fieldset>
						<div class="form-group">
							<?php echo $this->Form->input('username', array('class' => 'form-control')); ?>
							<!-- input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="" -->
							<?php echo $this->Form->input('password', array('class' => 'form-control')); ?>
							<!--input class="form-control" placeholder="Password" name="password" type="password" value="" -->
						</div>
						<div class="checkbox">
							<label>
								<input name="remember" type="checkbox" value="Remember Me">Remember Me
							</label>
						</div>
						<!-- Change this to a button or input when using this as a form -->
						<!-- a href="javascript:;" class="btn btn-sm btn-success">Login</a -->
						<?php echo $this->Form->end(__('Login')); ?>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>
<hr>