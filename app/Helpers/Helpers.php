<?php

if (! function_exists('mix_e')) {
    /**
     *
     *
     * @param string $path
     * @return string
     */
    function mix_e($path)
    {
        return url(mix($path));
    }
}

