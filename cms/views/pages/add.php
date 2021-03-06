<?php echo $header; ?>

<form method="post" action="<?php echo Uri::to('uladmin/pages/add'); ?>" enctype="multipart/form-data" novalidate>
  <input name="token" type="hidden" value="<?php echo $token; ?>">

  <fieldset class="header">
    <div class="wrap">

      <aside class="buttons">
          <?php echo Form::button(__('global.save'), [
              'type'  => 'submit',
              'class' => 'btn'
          ]); ?>
        <a class="btn autosave-action autosave-label secondary" style="width: 154px;">Autosave: Off</a>
          <?php echo Form::button(__('pages.redirect'), [
              'class' => 'btn secondary redirector'
          ]); ?>

          <?php echo Html::link('uladmin/pages', __('global.cancel'), [
              'class' => 'btn cancel blue'
          ]); ?>
      </aside>

        <?php echo Form::text('title', Input::previous('title'), [
            'placeholder'  => __('pages.title'),
            'autocomplete' => 'off',
            'autofocus'    => 'true'
        ]); ?>

    </div>
  </fieldset>

  <fieldset class="redirect">
    <div class="wrap">
        <?php echo Form::text('redirect', Input::previous('redirect'), [
            'placeholder' => __('pages.redirect_url')
        ]); ?>
    </div>
  </fieldset>

  <fieldset class="main">
    <div class="wrap">
        <?php echo Form::textarea('markdown', Input::previous('markdown'), [
            'placeholder' => __('pages.content_explain')
        ]); ?>

        <?php echo $editor; ?>
    </div>
  </fieldset>

  <fieldset class="meta split">
    <div class="wrap">
      <p>
        <label for="label-show_in_menu"><?php echo __('pages.show_in_menu'); ?>:</label>
          <?php echo Form::checkbox('show_in_menu', 1, Input::previous('show_in_menu', 0) == 1,
              ['id' => 'label-show_in_menu']); ?>
        <em><?php echo __('pages.show_in_menu_explain'); ?></em>
      </p>
      <p>
        <label for="label-name"><?php echo __('pages.name'); ?>:</label>
          <?php echo Form::text('name', Input::previous('name'), ['id' => 'label-name']); ?>
        <em><?php echo __('pages.name_explain'); ?></em>
      </p>
      <p>
        <label for="label-slug"><?php echo __('pages.slug'); ?>:</label>
          <?php echo Form::text('slug', Input::previous('slug'), ['id' => 'label-slug']); ?>
        <em><?php echo __('pages.slug_explain'); ?></em>
      </p>
      <p>
        <label for="label-status"><?php echo __('pages.status'); ?>:</label>
          <?php echo Form::select('status', $statuses, Input::previous('status'), ['id' => 'label-status']); ?>
        <em><?php echo __('pages.status_explain'); ?></em>
      </p>
      <p>
        <label for="label-parent"><?php echo __('pages.parent'); ?>:</label>
          <?php echo Form::select('parent', $pages, Input::previous('parent'), ['id' => 'label-parent']); ?>
        <em><?php echo __('pages.parent_explain'); ?></em>
      </p>
        <?php if (count($pagetypes) > 0): ?>
          <p>
            <label for="pagetype"><?php echo __('pages.pagetype'); ?>:</label>
            <select id="pagetype" name="pagetype">
                <?php foreach ($pagetypes as $pagetype): ?>
                    <?php $selected = ($pagetype->key == 'all') ? ' selected="selected"' : ''; ?>
                  <option
                    value="<?php echo $pagetype->key; ?>" <?php echo $selected; ?>><?php echo $pagetype->value; ?></option>
                <?php endforeach; ?>
            </select>
            <em><?php echo __('pages.pagetype_explain'); ?></em>
          </p>
        <?php endif; ?>
      <div id="extended-fields">
          <?php foreach ($fields as $field): ?>
              <?php if ($field->pagetype == 'all'): ?>
              <p>
                <label for="extend_<?php echo $field->key; ?>"><?php echo $field->label; ?>:</label>
                  <?php echo Extend::html($field); ?>
              </p>
              <?php endif; ?>
          <?php endforeach; ?>
      </div>
    </div>
  </fieldset>
</form>

<script src="<?php echo asset('cms/views/assets/js/slug.js'); ?>"></script>
<script src="<?php echo asset('cms/views/assets/js/page-name.js'); ?>"></script>
<script src="<?php echo asset('cms/views/assets/js/redirect.js'); ?>"></script>
<script src="<?php echo asset('cms/views/assets/js/upload-fields.js'); ?>"></script>
<script src="<?php echo asset('cms/views/assets/js/text-resize.js'); ?>"></script>
<script src="<?php echo asset('cms/views/assets/js/editor.js'); ?>"></script>
<script src="<?php echo asset('cms/views/assets/js/autosave.js'); ?>"></script>
<script>
  $( 'textarea[name=markdown]' ).editor();
  $( '#pagetype' ).on( 'change', function () {
    var $this = $( this );
    $.post( "<?php echo Uri::to('uladmin/get_fields'); ?>", {
      pagetype: $this.val(),
      token:    "<?php echo $token; ?>"
    }, function ( res ) {
      res = JSON.parse( res );
      $( '#extended-fields' ).html( res.html );
      $( 'input[name="token"]' ).replaceWith( res.token );
    } );
  } );
</script>

<?php echo $footer; ?>
