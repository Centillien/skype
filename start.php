<?php
/**
 * Skype Plugin 
 * This plugin allows users to chat or call using Skype
 *
 * @package Skype
 */

	elgg_register_event_handler('init', 'system', 'skype_init');

        //Register js in cache
        elgg_register_simplecache_view('js/skype/skype_uri');
        $url = elgg_get_simplecache_url('js', 'skype/skype_uri');
        elgg_register_js('skype_uri', $url);

	

function skype_init() {
        elgg_register_widget_type('skype', elgg_echo('skype:title'), elgg_echo('skype:info'));

        // user hover menu
        elgg_register_plugin_hook_handler('register', 'menu:user_hover', 'skype_user_hover_menu');


function skype_user_hover_menu($hook, $type, $return, $params) {
$user = $params['entity'];

	$text = elgg_echo('skype:callme');
	$no_skype_text = elgg_echo('skype:noskype');
        $url = "<a href ='skype:$user->skype?chat'>" . $text ."</a>";
        $no_skype = "<a href ='http://www.skype.com'>" . $no_skype_text ."</a>";

	if($user->skype) {
		$item = ElggMenuItem::factory(array(
 		'name' => 'Skype',
 		'text' => $url,
 		'href' => false,
 		));
		$return[] = $item;        
	}else{
	 if(elgg_get_plugin_setting("no_skype_setting","skype") == 'yes') {
                $item = ElggMenuItem::factory(array(
                'name' => 'Skype',
                'text' => $no_skype,
                'href' => false,
                ));
                $return[] = $item;
		}
        }
        return $return;
        }
}
