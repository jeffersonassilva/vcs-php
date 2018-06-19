vcs-php
================

PHP >= 5.6

Display the code version of the project.

Installation
------------

Use [Composer] to install the package.

Update your composer.json

```
"require": {
    "jeffersonassilva/vcs-php": "*"
}
```

or use composer's require command:

```
$ composer require jeffersonassilva/vcs-php
```

Required
-------

It is necessary that your variable **$_SERVER["DOCUMENT_ROOT"]** is correct, based in your project path. If it is not, you can pass the path as a parameter in all functions.

```php
echo VcsPHP::isGIT('/var/www/my-project');
```

Usage Examples
-------

```php
use jeffersonassilva\VcsPHP\VcsPHP;

echo VcsPHP::branch();
```

### Functions

Method                                                                   | Description                  | GIT/SVN
------------------------------------------------------------------------ | ---------------------------- | :-------:
`isGIT([string $dir = null])`                                            | Check it if vcs is GIT.      | GIT
`isSVN([string $dir = null])`                                            | Check it if vcs is SVN.      | SVN
`branch([string $dir = null])`                                           | Show the branch name         | GIT
`tag([string $dir = null])`                                              | Show the tag name            | GIT
`revision([bool $long = false], [string $dir = null])`                   | Show the revision code.      | GIT
`dateCommit(string $format = '%Y-%m-%d %H:%M:%S', [string $dir = null])` | Show the date commit.        | GIT
`nameCommit([string $dir = null])`                                       | Show the name of committer.  | GIT
`emailCommit([string $dir = null])`                                      | Show the email of committer. | GIT
`subject([string $dir = null])`                                          | Show the subject commit.     | GIT

Author
-------

* Jefferson Alessandro Santos da Silva - [@jeffersonassilva]

Contribute
----------

Contributions to the package are always welcome!

* Report any bugs or issues you find on the [issue tracker].
* You can grab the source code at the package's [Git repository].

Support
-------

If you are having problems, send a mail to jeffersonassilva@gmail.com.


[Composer]: https://getcomposer.org
[issue tracker]: https://github.com/jeffersonassilva/vcs-php/issues
[Git repository]: https://github.com/jeffersonassilva/vcs-php
[@jeffersonassilva]: https://instagram.com/jeffersonassilva/