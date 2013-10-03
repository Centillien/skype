<?php
        /*
         * Skype widget
         *
         * Full Creadit goes to ELGG Core Team for creating a beautiful social networking script
         *
         *
         * @author Gerard Kanters
         * @copyright Centillien 2013
         * @link http://www.centillien.com/
         * @version 1.0.5
         *
         */

elgg_load_js('skype_uri');

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

if (empty($skype_name)) {
        echo "<p>" . elgg_echo("skype:notset") . "</p>";
        return;
}

$username_is_valid = preg_match('~^[a-zA-Z0-9_.-]{1,9999}$~', $skype_name);
if (!$username_is_valid) {
        echo "<p>" . elgg_echo("skype:invalid") . "</p>";
        return;
}

?>
<div id="genSkypeCall" style="width:20%;background-color:white">
 <script type="text/javascript">
        Skype.ui({
            name: "<?php echo $skype_type;?>",
            element: "genSkypeCall",
            participants: ["<?php echo $skype_name;?>"],
            imageSize: 32,
            imageColor: "skype"
        });
    </script>
</div>

