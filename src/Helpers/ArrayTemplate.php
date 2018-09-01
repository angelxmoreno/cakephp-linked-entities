<?php

namespace LinkedEntities\Helpers;

/**
 * Class ArrayTemplate
 * @package LinkedEntities\Helpers
 */
class ArrayTemplate
{
    /**
     * @param array $data
     * @param array $replacements
     * @return array
     */
    public static function replace(array $data, array $replacements)
    {
        $json = json_encode($data);

        foreach ($replacements as $key => $val) {
            $json = str_replace("{{{$key}}}", $val, $json);
        }

        return json_decode($json, true);
    }
}
