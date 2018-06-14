<?php

namespace Jeffersonassilva\VcsPHP;

class VcsPHP
{
    /**
     * Check it if vcs is GIT
     * @param string $dir Document root of project
     * @return bool
     */
    public static function isGIT($dir = null)
    {
        $root = $dir ? $dir : $_SERVER["DOCUMENT_ROOT"] . $_SERVER["REQUEST_URI"];
        return is_dir($root . "/.git") ? true : false;
    }

    /**
     * Check it if vcs is SVN
     * @param string $dir Document root of project
     * @return bool
     */
    public static function isSVN($dir = null)
    {
        $root = $dir ? $dir : $_SERVER["DOCUMENT_ROOT"] . $_SERVER["REQUEST_URI"];
        return is_dir($root . "/.svn") ? true : false;
    }

    /**
     * Show the branch name
     * @return string
     */
    public static function branch()
    {
        exec("git rev-parse --abbrev-ref HEAD", $branchName);
        return current($branchName);
    }

    /**
     * Show the tag name
     * @return string
     */
    public static function tag()
    {
        exec("git describe --tags --abbrev=0", $tagName);
        return array_pop($tagName);
    }

    /**
     * Show the revision code
     * @return string
     */
    public static function revision()
    {
        exec("git log -1 --pretty=format:'%h'", $revision);
        return current($revision);
    }
}