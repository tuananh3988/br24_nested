<?php

/**
 * Description of Utility
 *
 * @author tuana
 */
class Utility {

    public static function createLink($id) {

        if ($id != 1) {
            $url = " [<a href='?action=create&id={$id}'>add</a>] [<a href='?action=delete&id={$id}'>Delete</a>]";
        } else {
            $url = " [<a href='?action=create&id={$id}'>add</a>] [<a href='?action=restore'>Restore tree</a>]";
        }
        return $url;
    }

    public static function createList($keys, $data) {
        $list = "<ul>";
        foreach ($keys as $key => $row) {
            if (count($row)) {
                $list .= '<li>' . $data[$key]['name'] . self::createLink($data[$key]['id']) . self::createList($row, $data) . '</li>';
            } else {
                $list .= '<li>' . $data[$key]['name'] . self::createLink($data[$key]['id']) . '</li>';
            }
        }

        $list .= "</ul>";
        if (strpos($list, '<li>') === false) {
            $list = '';
        }
        return $list;
    }

}
