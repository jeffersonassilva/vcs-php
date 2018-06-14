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

Example
-------

```php
use jeffersonassilva\VcsPHP\VcsPHP;

echo VcsPHP::branch();
```

### Functions list

Method             | Description            | GIT / SVN
------------------ | ---------------------- | --------------------
`isGIT($dir = '')` | Check it if vcs is GIT | GIT
`isSVN($dir = '')` | Check it if vcs is SVN | SVN
`branch()`         | Show the branch name   | GIT
`tag()`            | Show the tag name      | GIT
`revision()`       | Show the revision code | GIT

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