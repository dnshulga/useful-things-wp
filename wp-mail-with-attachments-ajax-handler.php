<?php
add_action('wp_footer', 'careers_ajax_handler', 99);
function careers_ajax_handler(){
	?>
	<script>
		jQuery(document).ready(function($){
			$('form').submit(function(e){
				e.preventDefault();

				let form = $(this);

				if (form.valid()) {
					$.ajax({
						type: "POST",
						url: '<?php bloginfo('template_url') ?>/inc/handler.php',
						data: new FormData(this),
						async: false,
						processData: false,
						contentType: false,
						cache: false,
						success: function (data) {
							console.log(data);
						},
						error: function (jqXHR, text, error) {
							console.log(data);
						}
					});
				}
				
			});
		});
	</script>
	<?php
}