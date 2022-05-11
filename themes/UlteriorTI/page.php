<?php theme_include('header'); ?>
<section class="banner">
<div id="" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="\ucms\themes\UlteriorTI\assets\carroussel\seguranca.opti.webp" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="\ucms\themes\UlteriorTI\assets\carroussel\seguranca.opti.webp" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="\ucms\themes\UlteriorTI\assets\carroussel\seguranca.opti.webp" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
</div>
</section>
<div class="container-lg">
	<div class="row justify-content-center">
		<div class="col-sm-8 ">
			<section class="homepage mt-4" id="corpo">
			<h1><?php echo page_title(); ?></h1>
			<?php echo page_content(); ?>
			</section>
		</div>
		<div class="col-sm-4 mt-4">
			<div class="lateral">
        <h3>Anuncie aqui</h3>
				<p>Anuncio será definido aqui</p>
			</div>
      <div class="lateral">
        <h3>Anuncie aqui</h3>
				<p>Anuncio será definido aqui</p>
			</div>
      <div class="lateral">
        <h3>Anuncie aqui</h3>
				<p>Anuncio será definido aqui</p>
			</div>
		</div>
</div>

<div class="area-destaques">
  <h1>Serviços</h1>
<div class="d-flex justify-content-center">
<div class="row">
  <?php while(rwar_destaques()):?>
    <div class="col mb-5">
      <div class="destaques">
        <div class="quadrodestaque">
        <div class="textoimagem">
            <a class="" href="<?php echo article_url(); ?>">
            <img class='imgquadro' src="<?php echo article_custom_field('img_artigo'); ?>">
            </a>
            <div class="centroimagem">
              <h5><?php echo page_title('article'); ?></h5>
            </div>
        </div>
        </div>
      </div>
    </div>
<?php endwhile; ?>
</div>
</div>  
</div>
<div class="posts">
  <h1>Posts recentes</h1>
<div class='d-flex '>
<div class="row justify-content-between">
  <?php while(rwar_latest_posts()):?>
    <div class="col mb-5">
      <div class="quadro">
        <div class="textoimagem">
            <a class="" href="<?php echo article_url(); ?>">
          <img class='imgquadro' src="<?php echo article_custom_field('img_artigo'); ?>">
          </a>
          <div class="centroimagem">
            <h5><?php echo page_title(); ?></h5>
          </div>
        </div>
      </div>
    </div>
<?php endwhile; ?>      
</div>  
</div>
</div>
</div>
<?php theme_include('footer');?>
