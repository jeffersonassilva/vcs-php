<?php

namespace jeffersonassilva\VcsPHP;

class VcsPHP
{
    /**
     * @param string $dir Directory's path of project
     * @return string
     */
    private function documentRoot($dir = null)
    {
        return $dir ? $dir : $_SERVER["DOCUMENT_ROOT"];
    }

    /**
     * Check it if vcs is GIT
     * @param string $dir Directory's path of project
     * @return bool
     */
    public static function isGIT($dir = null)
    {
        return is_dir(VcsPHP::documentRoot($dir) . "/.git") ? true : false;
    }

    /**
     * Check it if vcs is SVN
     * @param string $dir Directory's path of project
     * @return bool
     */
    public static function isSVN($dir = null)
    {
        return is_dir(VcsPHP::documentRoot($dir) . "/.svn") ? true : false;
    }

    /**
     * Show the branch name
     * @param string $dir Directory's path of project
     * @return string
     */
    public static function branch($dir = null)
    {
        $branchName = array();
        $path = VcsPHP::documentRoot($dir);
        if (VcsPHP::isGIT($dir)) {
            exec("cd $path && git rev-parse --abbrev-ref HEAD", $branchName);

        } else if (VcsPHP::isSVN($dir)) {
            exec("cd $path && svn info | grep '^URL:' | egrep -o '(branches)/[^/]+' | egrep -o '[^/]+$'", $branchName);
        }
        return current($branchName);
    }

    /**
     * Show the tag name
     * @param string $dir Directory's path of project
     * @return string
     */
    public static function tag($dir = null)
    {
        $tagName = array();
        $path = VcsPHP::documentRoot($dir);
        if (VcsPHP::isGIT($dir)) {
            exec("cd $path && git describe --tags --abbrev=0", $tagName);

        } else if (VcsPHP::isSVN($dir)) {
            exec("cd $path && svn info | grep '^URL:' | egrep -o '(tags)/[^/]+' | egrep -o '[^/]+$'", $tagName);
        }
        return current($tagName);
    }

    /**
     * Show the revision code
     * @param bool $long Optional type of revision, defatul is short
     * @param string $dir Directory's path of project
     * @return mixed
     */
    public static function revision($long = false, $dir = null)
    {
        $revision = array();
        $path = VcsPHP::documentRoot($dir);
        $format = $long ? 'H' : 'h';
        if (VcsPHP::isGIT($dir)) {
            exec("cd $path && git log -1 --pretty=format:'%$format'", $revision);

        } else if (VcsPHP::isSVN($dir)) {
            exec("cd $path && svn info | grep 'Revision' | awk '{print $2}'", $revision);
        }
        return current($revision);
    }

    /**
     * Show the name of author
     * @param string $dir Directory's path of project
     * @return mixed
     */
    public static function authorName($dir = null)
    {
        $authorName = array();
        $path = VcsPHP::documentRoot($dir);
        if (VcsPHP::isGIT($dir)) {
            exec("cd $path && git log -1 --pretty='format:%an'", $authorName);

        } else if (VcsPHP::isSVN($dir)) {
            exec("cd $path && svn info | grep 'Author' | awk '{print $4}'", $authorName);
        }
        return current($authorName);
    }

    /**
     * Show the author date
     * @param string $format Format of date, default is american format '%Y-%m-%d %H:%M:%S'
     * @param string $dir Directory's path of project
     * @return mixed
     */
    public static function authorDate($format = 'Y-m-d H:i:s', $dir = null)
    {
        $authorDate = array();
        $path = VcsPHP::documentRoot($dir);
        if (VcsPHP::isGIT($dir)) {
            $format = VcsPHP::formatDateToGit($format);
            exec("cd $path && git log -1 --pretty='format:%ad' --date=format:'$format'", $authorDate);

        } else if (VcsPHP::isSVN($dir)) {
            exec("cd $path && svn info | grep 'Date' | awk '{print $4\" \"$5}'", $authorDate);
            $authorDate = VcsPHP::formatDateToSvn($authorDate, $format);
        }
        return current($authorDate);
    }

    /**
     * Show the name of committer
     * @param string $dir Directory's path of project
     * @return mixed
     */
    public static function committerName($dir = null)
    {
        $path = VcsPHP::documentRoot($dir);
        exec("cd $path && git log -1 --pretty='format:%cn'", $committerName);
        return current($committerName);
    }

    /**
     * Show the email of committer
     * @param string $dir Directory's path of project
     * @return mixed
     */
    public static function committerEmail($dir = null)
    {
        $path = VcsPHP::documentRoot($dir);
        exec("cd $path && git log -1 --pretty='format:%ce'", $committerEmail);
        return current($committerEmail);
    }

    /**
     * Show the date of committer
     * @param string $format Optional format of date, default is american format '%Y-%m-%d %H:%M:%S'
     * @param string $dir Directory's path of project
     * @return mixed
     */
    public static function committerDate($format = 'Y-m-d H:i:s', $dir = null)
    {
        $committerDate = array();
        $path = VcsPHP::documentRoot($dir);
        if (VcsPHP::isGIT($dir)) {
            $format = VcsPHP::formatDateToGit($format);
            exec("cd $path && git log -1 --pretty='format:%cd' --date=format:'$format'", $committerDate);

        } else if (VcsPHP::isSVN($dir)) {
            exec("cd $path && svn info | grep 'Date' | awk '{print $4\" \"$5}'", $committerDate);
            $committerDate = VcsPHP::formatDateToSvn($committerDate, $format);
        }
        return current($committerDate);
    }

    /**
     * Show the subject commit
     * @param string $dir Directory's path of project
     * @return mixed
     */
    public static function subject($dir = null)
    {
        $path = VcsPHP::documentRoot($dir);
        exec("cd $path && git log -1 --pretty='format:%s'", $subject);
        return current($subject);
    }

    /**
     * @param $format
     * @return mixed
     */
    private function formatDateToGit($format)
    {
        $format = str_replace('i', 'M', $format);
        $format = str_replace('s', 'S', $format);
        $format = preg_replace('/[a-zA-Z]/', '%$0', $format);
        return $format;
    }

    /**
     * @param $dateCommit
     * @param $format
     * @return array
     */
    private function formatDateToSvn($dateCommit, $format)
    {
        $arrayDate = array();
        foreach ($dateCommit as $key => $dt) {
            $arrayDate[$key] = date($format, strtotime($dt));
        }
        return $arrayDate;
    }
}