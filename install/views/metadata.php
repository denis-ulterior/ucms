<?php echo $header; ?>

<section class="content">
  <article>
    <h1>Site metadata</h1>
    <p>Para personalizar seu blog U-CMS, é recomendável adicionar alguns metadados sobre seu site. Isso tudo pode ser
       mudou a qualquer momento, no entanto.</p>
    <p>In order to personalise your U-CMS blog, it's recommended you add some metadata about your site. This can all be
       changed at any time, though.</p>

      <?php echo Notify::read(); ?>
  </article>

  <form method="post" action="<?php echo Uri::to('metadata'); ?>" autocomplete="off">

    <fieldset>
      <p>
        <label for="site_name">Nome do site / Site Name</label>
        <i>Como seu site irá se chamar? / What your site called?</i>

        <input id="site_name" name="site_name"
               value="<?php echo Input::previous('site_name', 'Meu site U-CMS'); ?>">
      </p>

      <p>
        <label for="site_description">Descrição / Description</label>
        <i>Descreva brevemente seu site.</i>

        <textarea id="site_description" name="site_description"><?php echo Input::previous('site_description',
                'Não é só um site, é o nosso blog.'); ?></textarea>
      </p>

      <p>
        <label for="site_path">Caminho do site /Site Path</label>
        <i>A pasta na qual a instalação rodará</i>
        <input id="site_path" name="site_path" value="<?php echo Input::previous('site_path', $site_path); ?>">
      </p>

        <?php if (count($themes) > 1): ?>
          <p>
            <label for="theme">Theme</label>
            <i>Your theme.</i>
            <select id="theme" name="theme">
                <?php foreach ($themes as $dir => $theme): ?>
                  <option value="<?php echo $dir; ?>"><?php echo $theme['name']; ?>
                    by <?php echo $theme['author']; ?></option>
                <?php endforeach; ?>
            </select>
          </p>
        <?php else: $theme = key($themes); ?>
          <input name="theme" type="hidden" value="<?php echo $theme; ?>">
        <?php endif; ?>

      <p>
        <label for="rewrite">Urls limpas / Clean Urls</label>
        <i>Reescrita de url / Url rewiting</i>

          <?php if (mod_rewrite()): ?>

      <div class="more">Verifique se o apache está com <code>mod_rewrite</code> ligado / enabled.<br>
                        O instalador criará o htaccess.
      </div>

    <?php elseif (is_apache()): ?>

      <div class="more">Você está rodando apache, mas <code>mod_rewrite</code> não está ligado / is not enabled.</div>

      <div class="more"><input id="rewrite" name="rewrite" type="checkbox" value="1">
        Criar htaccess de qualquer forma.
      </div>

    <?php elseif (is_cgi()): ?>

      <div class="more">Parece que você está rodando <code>PHP</code>como fastcgi.<br>
                        Você terá que configurar sua própria reescrita de url.
      </div>

    <?php endif; ?>
      </p>
    </fieldset>

    <section class="options">
      <a href="<?php echo uri_to('database'); ?>" class="btn quiet">&laquo; Voltar / Back</a>
      <button type="submit" class="btn">Avançar /Next Step &raquo;</button>
    </section>
  </form>
</section>

<?php echo $footer; ?>
