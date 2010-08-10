#Gnocchi

A simple Inversion of Control/Dependency Injection tool for PHP.

See more about Inversion of Control: <http://en.wikipedia.org/wiki/Inversion_of_Control>

**Gnocchi** would be integrated with [Bread](http://github.com/giran/bread "Bread framework"), a MVC PHP framework.

##Hacking

Contributors are welcome :) You can fork it, code, test, commit, push and send pull requests.

###Dependencies

The only dependency on coding is the [PHPUnit](http://www.phpunit.de "PHPUnit") test framework. To install PHPUnit using Pear, just run on terminal:

> $ [sudo] pear channel-discover pear.phpunit.de
>
> $ [sudo] pear channel-discover pear.symfony-project.com
>
> $ [sudo] pear install phpunit/PHPUnit

If you don't want to use PEAR, check the [PHPUnit official web site](http://www.phpunit.de/manual/3.4/en/installation.html "PHPUnit official web site") out to see how to install it.

###Running tests

There is a *Makefile* used for running tests, so it is so easy to run tests:

> $ make test
