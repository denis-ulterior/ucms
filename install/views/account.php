<?php echo $header; ?>

<section class="content">

  <article>
    <h1>Sua primeira conta / Your first account</h1>
  <p>Estamos tão tentadoramente perto! Tudo o que precisamos agora é de um nome de usuário e senha para fazer login na área administrativa.</p>
    <p>Oh, we're so tantalisingly close! All we need now is a username and password to log in to the admin area
       with.</p>

      <?php echo Notify::read(); ?>
  </article>

  <form method="post" action="<?php echo uri_to('account'); ?>" autocomplete="off">

    <fieldset>
      <p>
        <label for="username">Usuario</label>
        <i>Será usado para logar, evite nome simples.</i>
        <input tabindex="1" id="username" name="username" value="<?php echo Input::previous('username', 'admin'); ?>">
      </p>

      <p>
        <label for="email">Email</label>
        <i>Necessário caso perca o login.</i>

        <input tabindex="2" id="email" type="email" name="email" value="<?php echo Input::previous('email'); ?>">
      </p>

      <p>
        <label>Senha</label>
        <i>Tenha certeza <a href="https://www.avast.com/random-password-generator" target="_blank">de criar uma senha boa</a>.</i>
        <input tabindex="3" name="password" type="password" value="<?php echo Input::previous('password'); ?>">
      </p>
    </fieldset>

    <section class="options">
      <a href="<?php echo uri_to('metadata'); ?>" class="btn quiet">&laquo; Voltar / Back</a>
      <button type="submit" class="btn">Completar / Complete</button>
    </section>
  </form>
</section>

<?php echo $footer; ?>
