<script>
$(function(){
	$(".nav-item-radio").addClass("current");	
})
</script>

<div id="content-wrap">
	<div class="row section-head">
		<div class="twelve columns">
				<p class="lead add-bottom">
					<?php $this->view('home/jplayer'); ?>
					<div class="fb-like" 
						data-href="<?php  echo base_url().uri_string() ?>" 
						data-layout="standard" 
						data-action="like" 
						data-show-faces="false"
						data-share="true">
					</div>
				</p>
				
				</div>
		</div>
		<div class="row">
			<div class="fb-comments" 
			data-href="<?php  echo base_url().uri_string() ?>" 
			data-numposts="5" 
			data-colorscheme="light"></div>
		</div>
	</div>
</div>
