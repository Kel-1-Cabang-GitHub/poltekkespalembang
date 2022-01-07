<?php $this->load->view('templates/navbar', ['nav_link' => base_url()]) ?>
<main>
    <div class="form-login">
        <h1>Login Admin</h1>
        <form action="<?= base_url() ?>Admin_Controller/post_login" method="POST">
            <span class="input-text">
                <label for="username">Username</label>
				<?php if (isset($username_error)): ?>
                	<input type="text" class="text <?= (form_error('username') || $username_error) ? 'input-error' : '' ?>" name="username" id="username" autofocus value="<?= ($username_value) ? set_value('username') : '' ?>">
				<?php endif; ?>
				<?php if (isset($username_error)): ?>
					<p class="pesan-error login-error"><?= $username_error ?></p>
				<?php endif; ?>
			</span>
            <span class="input-text">
                <label for="password">Password</label>
				<?php  if (isset($password_error)): ?>
                	<input type="password" class="text <?= (form_error('password') || $password_error) ? 'input-error' : '' ?>" name="password" id="password">
				<?php endif; ?>
				<?php if (isset($password_error)): ?>
					<p class="pesan-error login-error"><?= $password_error; ?></p>
				<?php endif; ?>
            </span>
            <div class="btn-page">
                <button type="submit" class="btn btn-success">Login</button>
            </div>
        </form>
    </div>
	<div class="scroll">
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#ffffff"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6 1.41 1.41z"/></svg>
    </div>
</main>
