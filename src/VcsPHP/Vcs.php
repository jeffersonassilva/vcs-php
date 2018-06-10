<?php

namespace VcsPHP;

class Vcs
{
    protected $content;

    /**
     * Vcs constructor.
     */
    public function __construct()
    {
        $this->content = 'Version here!';
    }

    /**
     * @return string
     */
    public function show()
    {
        return $this->content;
    }
}