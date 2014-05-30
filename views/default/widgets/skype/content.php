<?php
        /*
         * Skype widget
         *
         * Full Creadit goes to ELGG Core Team for creating a beautiful social networking script
         *
         *
         * @author Gerard Kanters
         * @copyright Centillien 2014
         * @link https://www.centillien.com/
         * @version 1.0.8
         *
         */

$owneruser = elgg_get_page_owner_entity();

if (isset($owneruser->skype)) {
      if (is_array($owneruser->skype)) {
                 		       $skype_name = implode(',', $owneruser->skype);
     				       }else {
      					     $skype_name = $owneruser->skype;
      					     }	
      					}else {
	    				      $skype_name = $vars['entity']->skype_username;
      				      }


$skype_type = $vars['entity']->skype_call_type;
if (empty($skype_type)) {
	$skype_type = 'chat';
	return;
}

if (empty($skype_name)) {
        echo "<p>" . elgg_echo("skype:notset") . "</p>";
	return;
}

$skype_name = str_replace("@", "",$skype_name);
$username_is_valid = preg_match('~^[a-zA-Z0-9_.-]{1,9999}$~', $skype_name);

if (!$username_is_valid) {
        echo "<p>" . elgg_echo("skype:invalid") . "</p>";
	return;
}

elgg_load_js('skype_uri');

?>
<div id="SkypeButton" style="width:20%;background-color:white">
 <script type="text/javascript">
        Skype.ui({
            name: "<?php echo $skype_type;?>",
            element: "SkypeButton",
            participants: ["<?php echo $skype_name;?>"],
            imageSize: 32,
            imageColor: "skype"
        });
    </script>
</div>

