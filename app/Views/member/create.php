


<?php $validation = \Config\Services::validation(); ?>

<form class="" action="<?php echo base_url('/submit-form') ?>" method="post" id="login">
    <?= csrf_field() ?>

    <div class="form-group">
      <label  for="pseudo">Pseudo</label>
      <input  type="text"
              class="form-control"
              id="pseudo"
              name="pseudo"
              placeholder="Enter Pseudo"
              required="true">
      <!-- Error -->
      <?php if ($validation->getError('pseudo')) {?>
          <div class="alert alert-danger mt-2">
              <?= $error = $validation->getError('pseudo'); ?>
          </div>
      <?php }?>
    </div>

    <div class="form-group">
      <label  for="mail">Email address</label>
      <input  type="email"
              class="form-control"
              id="mail"
              name="mail"
              aria-describedby="emailHelp"
              placeholder="Enter email"
              required="true">
      <small id="emailHelp" class="form-text text-muted">
            We'll never share your email with anyone else.
      </small>
      <!-- Error -->
      <?php if ($validation->getError('mail')) {?>
          <div class="alert alert-danger mt-2">
              <?= $error = $validation->getError('mail'); ?>
          </div>
      <?php }?>
    </div>

    <div class="form-group">
        <label  for="password">Password</label>
        <input  type="password"
                class="form-control"
                id="password"
                name="password"
                placeholder="Password"
                required="true">
      <!-- Error -->
      <?php if ($validation->getError('password')) {?>
          <div class="alert alert-danger mt-2">
              <?= $error = $validation->getError('password'); ?>
          </div>
      <?php }?>
      </div>

      <div class="form-group">
        <label for="pass_confirm">Confirm password</label>
        <input  type="password"
                class="form-control"
                id="pass_confirm"
                name="pass_confirm"
                placeholder="Confirm password"
                required="true">
      </div>
      <!-- Error -->
      <?php if ($validation->getError('pass_confirm')) {?>
          <div class="alert alert-danger mt-2">
              <?= $error = $validation->getError('pass_confirm'); ?>
          </div>
      <?php }?>

      <button type="submit" name="submit" class="btn btn-primary btn-block">Inscription</button>

</form>
