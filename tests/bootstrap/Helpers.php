<?php

declare(strict_types=1);
/**
 * A new PHP page
 *
 * Date: 10/16/2022
 *
 * @author  Charles Brookover
 * @license MIT
 * @version 0.0.1
 */

namespace Tests\Bootstrap;

class Helpers
{

    public static function hashString(string $string)
    : string {
        return hash('sha512', $string);
    }
}