<div class="container">
  <div class="row justify-content-center">
    <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
      <div class="card card-plain">
        <div class="card-header pb-0 text-start">
          <h4 class="font-weight-bolder">Login</h4>
          <p class="mb-0">Entre com seu Email</p>
        </div>
        <div class="card-body">
          <?php if (isset(session()->msg)): ?>
            <div class="alert alert-warning">
              <?= session()->flush('msg'); ?>
            </div>
          <?php endif ?>
          <form role="form" action="\logar" method="POST">
            <?= CSRF() ?>
            <div class="form-group mb-3">
              <input type="text" class="form-control form-control-lg <?= has_error('login', 'is-invalid') ?>"
                placeholder="Email" name="login" value="<?=old('login')?>">
              <ul class="invalid-feedback">
                <?php
                foreach (errors('login') as $error): ?>
                  <li><?= $error ?></li>
                <?php endforeach ?>
              </ul>
            </div>
            <div class="mb-3 form-group">
              <input type="password" class="form-control form-control-lg <?= has_error('senha', 'is-invalid') ?>"
                placeholder="Senha" aria-label="Password" name="senha">
              <ul class="invalid-feedback">
                <?php foreach (errors('senha') as $error): ?>
                  <li><?= $error ?></li>
                <?php endforeach ?>
              </ul>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Entrar</button>
            </div>
          </form>
        </div>
      
      </div>
    </div>
  </div>
</div>