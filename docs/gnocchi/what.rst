What is Gnocchi?
================

Gnocchi are various thick, soft dumplings. They may be made from semolina, ordinary wheat flour, potato, bread crumbs, or similar ingredients. The smaller forms are called gnocchetti. (reference: `Wikipedia <http://en.wikipedia.org/wiki/Gnocchi>`_).

Gnocchi is also a IoC/DI container for PHP.

How do I use Gnocchi?
+++++++++++++++++++++

If you know why and where you should use Gnocchi, you may want to know how to use it. If you don't know why and/or where to use Gnocchi, check :doc:`About IoC/DI </introduction/ioc>` section.

Gnocchi using is easy. Let's create a simple example where we will define a class called Person with two attributes: name and age. Here is the code of the class:

.. highlight:: php

::

    <?php

    class Person {

        private $name, $age;

        function __construct($name, $age) {
            $this->name = $name;
            $this->age = $age;
        }

        public function getName() {
            return $this->name;
        }

        public function getAge() {
            return $this->age;
        }

    }

    ?>

``Person`` will be a component managed by the Gnocchi Container. So, the first step is create the container:

.. highlight:: php

::

    <?php

    // Class definition made above

    $container = new GnocchiContainer();
    $container->addComponent("Person", array('name' => 'John', 'age' => 70));

    ?>

The ``GnocchiContainer`` class provides a method to add components, that method receives two parameters:

    #. A string representing the name of the class that will be managed by Gnocchi;
    #. An array representing the constructor parameters. This parameter is optional and you can set an array containing the constructor parameters late.

You can add components to a ``GnocchiContainer`` as you want. So, you can use a container to manage the components, and an assembler to assembly a component. In other words, you use the ``GnocchiAssembler`` to get instances of the managed components. So you can use the ``GnocchiAssembler`` to get an instance of ``Person`` easily:

.. highlight:: php

::

    <?php

    // Container definition made above

    $assembler = new GnocchiAssembler();
    $assembler->setContainer($container);
    $person = $assembler->get("Person");

    ?>

The ``$person`` object was instantiated by the assembler. The assembler calls the constructor passing the parameters specified when we added the component to the container, so the name of the ``$person`` object is *John* and he is *70* years old.
