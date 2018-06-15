<?php

namespace jeffersonassilva\VcsPHP;

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
     * @param bool $long Optional type of revision, defatul is short
     * @return mixed
     */
    public static function revision($long = false)
    {
        $format = $long ? 'H' : 'h';
        exec("git log -1 --pretty=format:'%$format'", $revision);
        return current($revision);
    }

    /**
     * Show the current date commit
     * @param string $format Optional format of date, default is american format '%Y-%m-%d %H:%M:%S'
     * @return string
     */
    public static function dateCommit($format = '%Y-%m-%d %H:%M:%S')
    {
        exec("git log -1 --pretty='format:%cd' --date=format:'$format'", $dateCommit);
        return current($dateCommit);
    }
}