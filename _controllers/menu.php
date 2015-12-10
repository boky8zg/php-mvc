<?php
    function Menu() {
        $menu = array(
            array('text' => 'Home', 'href' => '/', 'active' => ''),
            array('text' => 'About', 'href' => '/about', 'active' => ''),
            array('text' => 'Contact', 'href' => '/contact', 'active' => '')
        );

        foreach ($menu as $key => $item) {
            if (route() == $item['href']) {
                $menu[$key]['active'] = 'class="active"';
            }
        }

        return $menu;
    }

    function ActiveMenuText() {
        foreach (Menu() as $item) {
            if ($item['active'] != '') {
                return $item['text'];
            }
        }
    }
?>