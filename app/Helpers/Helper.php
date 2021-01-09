<?php

namespace App\Helpers;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class Helper
{
    public static function nestedToArray($list, $key): array
    {
        if ($list instanceof Collection || $list instanceof Category) {
            $list = $list->toArray();
        }

        $return = [];

        if (!isset($list['id'])) {
            foreach ($list as $item) {
                $return[] = $item[$key];

                if (!empty($item['recursive_children'])) {
                    $return = array_merge($return, self::nestedToArray($item['recursive_children'], $key));
                }
            }
        } else {
            $return[] = $list[$key];

            if (!empty($list['recursive_children'])) {
                $return = array_merge($return, self::nestedToArray($list['recursive_children'], $key));
            }
        }
        return $return;
    }

    public static function nestedToHtml($list): string
    {
        if ($list instanceof Collection || $list instanceof Category) {
            $list = $list->toArray();
        }

        $return = "";

        $return .= "<ul>";
        foreach ($list as $item) {
            $return .= '<li> <a href="/category/' . $item['id'] . '">' . $item['name'] . '</a></li>';

            $return .= self::nestedToHtml($item['recursive_children']);
        }
        $return .= "</ul>";

        return $return;
    }
}
