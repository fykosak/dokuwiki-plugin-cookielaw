<?php
/**
 * DokuWiki Plugin cookielaw (Action Component)
 *
 * @license GPL 2 http://www.gnu.org/licenses/gpl-2.0.html
 * @author  Michal Koutny <michal@fykos.cz>
 */

// must be run within Dokuwiki
if(!defined('DOKU_INC')) die();

class action_plugin_cookielaw extends DokuWiki_Action_Plugin {

    /**
     * Registers a callback function for a given event
     *
     * @param Doku_Event_Handler $controller DokuWiki's event controller object
     * @return void
     */
    public function register(Doku_Event_Handler $controller) {

       $controller->register_hook('TPL_ACT_RENDER', 'AFTER', $this, 'handle_tpl_act_render');
   
    }

    /**
     * [Custom event handler which performs action]
     *
     * @param Doku_Event $event  event object by reference
     * @param mixed      $param  [the parameters passed as fifth argument to register_hook() when this
     *                           handler was registered]
     * @return void
     */

    public function handle_tpl_act_render(Doku_Event &$event, $param) {
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
        echo '<a href="' . hsc($this->getLang('details_url')) . '" target="_blank">' . hsc($this->getLang('details')) . '</a>';
        echo '</div>';
    }

}

// vim:ts=4:sw=4:et:
