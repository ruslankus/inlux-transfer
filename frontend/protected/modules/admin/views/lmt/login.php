<form class="form-signin" method="post" action="<?php echo $this->createUrl('/admin/lmt/login/'); ?>">

    <?php if(isset($error)): ?>
    <div class="alert alert-danger">
        <strong>Error!</strong> Password or login is wrong.
    </div>
    <?php endif; ?>

    <h2 class="form-signin-heading">Please sign in</h2>
    <input type="text" name="login" class="form-control" placeholder="Login" required autofocus>
    <input type="password" name="password" class="form-control" placeholder="Password" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
</form>