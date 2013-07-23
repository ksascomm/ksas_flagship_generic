<!--
For development environment search and replace javascripts/min. for javascripts/
For production environment search and replace javascripts/ for javascripts/min.
-->
<!***********ALL PAGES**************>
  <script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/min.foundation.js"></script> 
  <script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/min.app.js"></script>
		<?php $user_agent = empty($_SERVER['HTTP_USER_AGENT']) ? false : $_SERVER['HTTP_USER_AGENT'];if(preg_match('/(ipad|viewpad|tablet|bolt|xoom|touchpad|playbook|kindle|gt-p|gt-i|sch-i|sch-t|mz609|mz617|mid7015|tf101|g-v|ct1002|transformer|silk| tab)/i', $user_agent ) || ( preg_match('/android/i', $user_agent ) && !preg_match('/mobile/i', $user_agent )) ) ://do something here for tablets  ?>
<script>
jQuery(document).ready(function () {
    jQuery('#main-nav').meanmenu({meanScreenWidth: "1400"});
});

</script>
<style>
#search-bar {margin-top:50px;}
#sidebar_header {display: none;}
</style>
		<?php else : ?>
<script>jQuery(document).ready(function () {
    jQuery('#main-nav').meanmenu();
});
</script>
<?php endif; ?>
<!***********HOMEPAGE**************>
<?php if ( is_front_page()) { ?>
	<script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/min.foundation.orbit.js"></script>
	<script>
		var $l = jQuery.noConflict();
		$l(window).load(function() {
        $l("#slider").orbit({
        	'animation' : 'horizontal-push',
        	'timer' : true,
        	'advanceSpeed' : 7000,
        	'directionalNav' : false,
	        'bullets' : false,		
        });
   });
   </script>
 <?php } ?> 
 
<!***********EVENT CALENDAR**************>
<?php $theme_option = flagship_sub_get_global_options();
if ( is_page_template( 'template-calendar.php' ))  { ?>   				
	<script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/min.easyXDM.js"></script>
	<?php $calendar_url = $theme_option['flagship_sub_calendar_address'];
		$url_for_script = "http://krieger.jhu.edu/calendar/calendar_holder.html?url=" . $calendar_url . "/"; ?>

				<script>
				    new easyXDM.Socket({
				        remote: "<?php echo $url_for_script; ?>",
				        container: document.getElementById("calendar_container"),
				        onMessage: function(message, origin){
				            this.container.getElementsByTagName("iframe")[0].style.height = message + "px";
				            this.container.getElementsByTagName("iframe")[0].style.width = "100%";
				        }
				    });
				</script>

<?php } ?>

<script>
var $l = jQuery.noConflict();
$l(document).ready(function() {
$l('.nav-bar .has-flyout .flyout .has-flyout').hover(function() {$l(this).find('ul.flyout').show();}, function() {$l(this).find('ul.flyout').hide();});
});
</script>