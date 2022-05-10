<?php echo $header; ?>

<section class="content">
  <article>
    <h1>Seu banco de dados / Your database details</h1>

    <p>Em primeiro lugar, precisaremos de um banco de dados.
       preencha estes campos corretamente. Se você não souber você precisará entrar em contato com seu webhost.</p>
    <p>Firstly, we'll need a database. cms needs them to store all of your blog's information, so it's vital you fill
       these in correctly. If you don't know what these are, you'll need to contact your webhost.</p>

      <?php echo Notify::read(); ?>
  </article>

  <form method="post" action="<?php echo uri_to('database'); ?>" autocomplete="off">

    <fieldset>
      <p>
        <label for="host">Driver</label>
        <select id="driver" class="chosen-select" name="driver">
            <?php foreach ($drivers as $driver): ?>
                <?php $selected = ($driver == Input::previous('driver', 'mysql')) ? ' selected' : ''; ?>
              <option value="<?php echo $driver; ?>" <?php echo $selected; ?>>
                  <?php echo $driver; ?>
              </option>
            <?php endforeach; ?>
        </select>

        <i>Suporta MySQL ou SQLite.</i>
      </p>
      <p>
        <label for="host">DB Server</label>
        <input id="host" name="host" value="<?php echo Input::previous('host', '127.0.0.1'); ?>">

        <i>Mais comum <b>localhost</b> ou <b>127.0.0.1</b>.</i>
      </p>

      <p>
        <label for="port">Porta / port</label>
        <input id="port" name="port" value="<?php echo Input::previous('port', '3306'); ?>">

        <i>Padrão / default <b>3306</b>.</i>
      </p>

      <p>
        <label for="user">Usuário / username</label>
        <input id="user" name="user" value="<?php echo Input::previous('user', 'root'); ?>">

        <i>O usuário, por padrao / default user  é <b>root</b></i>
      </p>

      <p>
        <label for="pass">Senha / password</label>
        <input id="pass" name="pass" type="password" value="<?php echo Input::previous('pass'); ?>"
               class="db-password-field">
        <i>Insira a senha do seu DB / DB pass</i>
      </p>

      <p>
        <label for="show-hide">Mostrar senha / password</label>
        <input name="show-hide" type="checkbox" value="Show/Hide password" class="show-hide-password">
        <i>Ver senha / Check pass</i>
      </p>
      <br>

      <p>
        <label for="name">Nome / DB Name</label>
        <input id="name" name="name" value="<?php echo Input::previous('name', 'cms'); ?>">
        <i>Nome do DB / DB name.</i>
      </p>

      <p>
        <label for="prefix">Prefixo da tabela / table</label>
        <input id="prefix" name="prefix" value="<?php echo Input::previous('prefix', 'cms_'); ?>">

        <i>Nome prefixo das tabelas / table name prefix.</i>
      </p>

      <p>
        <label for="collation">Collation</label>
        <select id="collation" class="chosen-select" name="collation">
            <?php foreach ($collations as $code => $collation): ?>
                <?php $selected = ($code == Input::previous('collation', 'utf8mb4_unicode_ci')) ? ' selected' : ''; ?>
              <option value="<?php echo $code; ?>" <?php echo $selected; ?>>
                  <?php echo $code; ?>
              </option>
            <?php endforeach; ?>
        </select>

        <i>Mude se / Change if <b>utf8mb4_unicode_ci</b> Não funcione / doesn't work.</i>
      </p>
    </fieldset>

    <section class="options">
      <a href="<?php echo uri_to('start'); ?>" class="btn quiet">&laquo; Back</a>
      <button type="submit" class="btn">Next Step &raquo;</button>
    </section>
  </form>
</section>

<?php echo $footer; ?>
