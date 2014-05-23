<?php
/**
 * Plugin settings
 */

$plugin = $vars["entity"];

$noyes_options = array(
	"no" => elgg_echo("option:no"),
	"yes" => elgg_echo("option:yes")
);

$yesno_options = array_reverse($noyes_options);

$no_skype_setting = $plugin->no_skype_setting;

echo elgg_echo('skype:no');
echo '<br><br>';
echo elgg_view("input/dropdown", array("name" => "params[no_skype_setting]", "options_values" => $noyes_options, "value" => $plugin->no_skype_setting));
echo '<br><br>';
