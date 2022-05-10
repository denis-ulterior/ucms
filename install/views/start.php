<?php echo $header; ?>

<section class="content">
  <article>
    <h1>Olá. Hello. Willkommen. Bonjour. Croeso.</h1>

    <p>Se você estava procurando por uma experiência de blog verdadeiramente leve, você
       encontrou o lugar certo. Basta preencher os detalhes abaixo, e você terá o seu
       novo blog criado em pouco tempo.</p>
    <p>If you were looking for a truly lightweight blogging experience, you&rsquo;ve
       found the right place. Simply fill in the details below, and you&rsquo;ll have your
       new blog set up in no time.</p>

      <?php echo Notify::read(); ?>
  </article>

  <form method="post" action="<?php echo uri_to('start'); ?>" autocomplete="off">

    <fieldset>
      <p>
        <label for="lang">
          <strong>Linguagem/Language</strong>
          <span class="info">U-cms's language.</span>
        </label>
        <select id="lang" class="chosen-select" name="language">
            <?php foreach ($languages as $lang): ?>
                <?php $selected = in_array($lang, $prefered_languages) ? ' selected' : ''; ?>
              <option<?php echo $selected; ?>><?php echo $lang; ?></option>
            <?php endforeach; ?>
        </select>
      </p>

      <p>
        <label for="timezone">
          <strong>Timezone</strong>
          <span class="info">Seu timezone/Your current time zone.</span>
        </label>
        <select id="timezone" class="chosen-select" name="timezone">
            <?php $set = false; ?>
            <?php foreach ($timezones as $zone): ?>
                <?php $selected = ($set === false and $current_timezone == $zone['timezone_id']) ? ' selected' : ''; ?>
              <option value="<?php echo $zone['timezone_id']; ?>"<?php echo $selected; ?>>
                  <?php echo $zone['label']; ?>
              </option>
                <?php if ($selected) {
                    $set = true;
                } ?>
            <?php endforeach; ?>
        </select>
      </p>
    </fieldset>

    <section class="options">
      <button type="submit" class="btn">Avançar / Next Step &raquo;</button>
    </section>
  </form>
</section>

<?php echo $footer; ?>
