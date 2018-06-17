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

Method                                    | Description | GIT/SVN
----------------------------------------- | ------------| --------------------
`isGIT($dir=null)`                        | Check it if vcs is GIT. | GIT
`isSVN($dir=null)`                        | Check it if vcs is SVN. | SVN
`branch()`                                | Show the current branch name | GIT
`tag()`                                   | Show the current tag name | GIT
`revision($long=false)`                   | Show the current revision code.<br />Default value is **false**. | GIT
`dateCommit($format='%Y-%m-%d %H:%M:%S')` | Show the current date commit.<br />Default value is the american format **'%Y-%m-%d %H:%M:%S'**. | GIT
`authorCommit()`                          | Show the current author commit. | GIT

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