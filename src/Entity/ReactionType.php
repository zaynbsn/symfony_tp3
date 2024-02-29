<?php

namespace App\Entity;

enum ReactionType: string
{
    case Like = "like";
    case Dislike = "dislike";

    public static function randomValue(): string
    {
        $arr = array_column(self::cases(), 'value');
        return $arr[array_rand($arr)];
    }

    public static function randomName(): string
    {
        $arr = array_column(self::cases(), 'name');

        return $arr[array_rand($arr)];
    }
}

