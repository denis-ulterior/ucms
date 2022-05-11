<div id="footer">
	<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<h4>Endereço:</h4>
					<p><?php echo site_meta('v');?></p>
				</div>
				<div class="col-lg-4">
					<h4>Redes sociais</h4>
					<p>
					<?php if(site_meta('acc_insta') !=''):?><a href="<?php echo insta_url(); ?>">Instagram</a><br/><?php endif; ?>

					<?php if(site_meta('acc_twitter') !=''):?><a href="<?php echo twitter_url(); ?>">Twitter</a><br/><?php endif; ?>

					<?php if(site_meta('acc_facebook') !=''):?><a href="<?php echo facebook_url(); ?>">Facebook</a><?php endif;?></p>
				</div>
				<div class="col-lg-4">
					<h4>Sobre <?php echo site_name(); ?></h4>
					<p><?php echo site_meta('sobre'); ?></p>
				</div>
			</div>
		</div>
    </div>
</div>
<script>var purecookieTitle="Cookies.",purecookieDesc="Ao acessar esse site, você entende que usamos cookies.",purecookieLink='<a href="http://testes.labserver.ulteriorti.local/ucms/politica-de-privacidade" target="_blank">Ler sobre?</a>',purecookieButton="Compreendo";function pureFadeIn(e,o){var i=document.getElementById(e);i.style.opacity=0,i.style.display=o||"block",function e(){var o=parseFloat(i.style.opacity);(o+=.02)>1||(i.style.opacity=o,requestAnimationFrame(e))}()}function pureFadeOut(e){var o=document.getElementById(e);o.style.opacity=1,function e(){(o.style.opacity-=.02)<0?o.style.display="none":requestAnimationFrame(e)}()}function setCookie(e,o,i){var t="";if(i){var n=new Date;n.setTime(n.getTime()+24*i*60*60*1e3),t="; expires="+n.toUTCString()}document.cookie=e+"="+(o||"")+t+"; path=/"}function getCookie(e){for(var o=e+"=",i=document.cookie.split(";"),t=0;t<i.length;t++){for(var n=i[t];" "==n.charAt(0);)n=n.substring(1,n.length);if(0==n.indexOf(o))return n.substring(o.length,n.length)}return null}function eraseCookie(e){document.cookie=e+"=; Max-Age=-99999999;"}function cookieConsent(){getCookie("purecookieDismiss")||(document.body.innerHTML+='<div class="cookieConsentContainer" id="cookieConsentContainer"><div class="cookieTitle"><a>'+purecookieTitle+'</a></div><div class="cookieDesc"><p>'+purecookieDesc+" "+purecookieLink+'</p></div><div class="cookieButton"><a onClick="purecookieDismiss();">'+purecookieButton+"</a></div></div>",pureFadeIn("cookieConsentContainer"))}function purecookieDismiss(){setCookie("purecookieDismiss","1",7),pureFadeOut("cookieConsentContainer")}window.onload=function(){cookieConsent()};</script>
</body>
</html>
