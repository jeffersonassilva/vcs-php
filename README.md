vcs-php
================

PHP >= 5.4

Display the code version of the project.

Installation
------------

Use [Composer] to install the package (dev-master `for a while`):

```
$ composer require jeffersonassilva/vcs-php:dev-master
```

Example
-------

```php
use Jeffersonassilva\VcsPHP\VcsPHP;

echo VcsPHP::branch();
```

### Functions list

Method                                                   | Description
-------------------------------------------------------- | --------------------------------------------------
`isGIT($dir = '')`                                       | Check it if vcs is GIT
`isSVN($dir = '')`                                       | Check it if vcs is SVN
`branch()`                                               | Show the branch name
`tag()`                                                  | Show the tag name

Author
-------

* [Jefferson Alessandro Santos da Silva] - [@jeffersonassilva]

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