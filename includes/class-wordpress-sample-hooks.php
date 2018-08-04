<?php

/**
 * @author: Codingmasster
 */
class WordpressSampleHooks {
    /*
     * You can register all the hooks here i.e. actions, filters, shortcodes etc...
     */

    public function register() {

        add_action('<your action>', array('<class object>', '<function>'));
        add_filter('<your filter>', array('<class object>', '<function>'));
        add_shortcode('<your shortcode>', array('<class object>', '<function>'));
    }

}
