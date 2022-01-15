<?php

use dokuwiki\Extension\ActionPlugin;
use dokuwiki\Extension\Event;
use dokuwiki\Extension\EventHandler;

if (!defined('DOKU_INC')) die();

/**
 * DokuWiki Plugin cookielaw (Action Component)
 *
 * @license GPL 2 http://www.gnu.org/licenses/gpl-2.0.html
 * @author  Michal Koutny <michal@fykos.cz> / Doc <doc@snowheaven.de>
 */
class action_plugin_cookielaw extends ActionPlugin {

    /**
     * Registers a callback function for a given event
     *
     * @param EventHandler $controller DokuWiki's event controller object
     * @return void
     */
    public function register(EventHandler $controller): void {
        $controller->register_hook('TPL_ACT_RENDER', 'AFTER', $this, 'handle_tpl_act_render');
    }

    /**
     * [Custom event handler which performs action]
     *
     * @param Event $event event object by reference
     * @return void
     */
    public function handle_tpl_act_render(Event $event): void {
        if ($event->data != 'show') {
            return;
        }

        if (isset($_COOKIE['cookielaw'])) {
            return;
        }

        $position = $this->getConf('position');

        echo '<div class="cookielaw-banner cookielaw-' . $position . '">';
        echo hsc($this->getLang('information'));
        echo '<button>' . hsc($this->getLang('consent')) . '</button>';
        echo '<a href="' . hsc($this->getLang('details_url')) . '" target="_blank">' . hsc($this->getLang('details')) . '</a> ';
        echo '<a href="' . hsc($this->getLang('details_url2')) . '" target="_blank">' . hsc($this->getLang('details2')) . '</a></br>';
        echo '</div>';
    }
}
