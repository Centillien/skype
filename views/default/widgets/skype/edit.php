<?php

/**
 * Skype edit page
 *
 * @package Skype widget
 */

?>
<div>
        <?php echo elgg_echo("skype:username"); ?>
        <?php echo elgg_view('input/text', array(
                'name' => 'params[skype_username]',
                'value' => $vars['entity']->skype_username,
        )) ?>
</div>
<div>
        <?php echo elgg_echo("skype:call"); ?>
        <?php echo elgg_view('input/dropdown', array(
                'name' => 'params[skype_call_type]',
		'options' => array(call, chat),
                'value' => $vars['entity']->skype_call_type,
        )) ?>
</div>
