Auja PHP Development Kit
==============

[![Build Status](https://travis-ci.org/Label305/Auja-PHP.svg?branch=master)](https://travis-ci.org/Label305/Auja-PHP)
[![Coverage Status](https://coveralls.io/repos/Label305/Auja-PHP/badge.png?branch=master)](https://coveralls.io/r/Label305/Auja-PHP?branch=master)
[![Dependency Status](https://www.versioneye.com/user/projects/54899173746eb519300002eb/badge.svg?style=flat)](https://www.versioneye.com/user/projects/54899173746eb519300002eb)
[![Latest Stable Version](https://poser.pugx.org/label305/auja/v/stable.svg)](https://packagist.org/packages/label305/auja)
[![Total Downloads](https://poser.pugx.org/label305/auja/downloads.svg)](https://packagist.org/packages/label305/auja)
[![Latest Unstable Version](https://poser.pugx.org/label305/auja/v/unstable.svg)](https://packagist.org/packages/label305/auja)

Auja is an easy-to-use, easy-to-implement admin interface. It provides an easy and intuitive way for you to view and manipulate your data, so you can focus on more important matters. Auja is designed to be both user-friendly _and_ developer-friendly by providing you with tools to setup your admin interface in a couple of minutes.

The [Auja javascript frontend](https://github.com/Label305/Auja) provides the graphical user interface. To determine its content, it relies on a JSON web-service you implement. This repository in turn, provides an Object Oriented approach to provide these JSON messages from a PHP application.

Related repositories
-----------
  
  - [**Auja**](https://github.com/Label305/Auja) - The frontend JavaScript GUI
  - [**Auja for Laravel**](https://github.com/Label305/Auja-Laravel) - An implementation of Auja for the Laravel framework

## Setup

Auja-PHP is available on [Packagist](https://packagist.org/packages/label305/auja).
Add Auja-PHP to your dependencies by running

    composer require label305/auja:v3.0.0-alpha5

## Usage

Auja uses three main types:

 - [Main](#main)
 - [Menu](#menu)
 - [Page](#page)
 
Each of these classes have implemented the `__toString()` method which returns valid JSON, accepted by the Auja JavaScript implementation. 
<a name="main"></a> 
### Main

The `Label305\Auja\Main\Main` class is used to define the main view of Auja. The following example will tell Auja to create a logout button, and add a single model item. It also adds an authentication form:

```php
$main = new Main();

$main->setTitle('My Application');
$main->setColor(Main::COLOR_MAIN, '#22bcb9');

/* Add a logout button. */
$logoutButton = new Button();
$logoutButton->setTitle($logoutButton);
$logoutButton->setTarget('#logout');
$main->addButton($logoutButton);

/* Add a model. */
$item = new Item();
$item
    ->setTitle('Club')
    ->setIcon('tower')
    ->setTarget('/clubs/menu');
$menu->addMenuItem($item);

/* Add an authentication form. */
$authenticationForm = new Form();
$authenticationForm
    ->setAction('#login')
    ->setMethod('POST');

    /* Add a username text field. */
    $usernameTextFormItem = new TextFormItem();
    $usernameTextFormItem
        ->setName('username')
        ->setLabel('Username');
    $authenticationForm->addFormItem($usernameTextFormItem);
    
    /* Add a password field. */
    $passwordFormItem = new PasswordFormItem();
    $passwordFormItem
        ->setName('password')
        ->setLabel('Password');
    $result->addFormItem($passwordFormItem);
    
    /* Add a submit button. */
    $submitFormItem = new SubmitFormItem();
    $submitFormItem->setText('Login');
    $result->addFormItem($submitFormItem);

$main->setAuthenticationForm($authenticationForm);

return $main;
```
<a name="menu"></a> 
### Menu

The `Label305\Auja\Menu\Menu` class is used to define the menus in Auja. The following example creates a menu for the `Club` model:

```php
$menu = new Menu();

/* Add a link item to add a club. */
$addMenuItem = new LinkMenuItem();
$addMenuItem
    ->setName('Add')
    ->setTarget('/clubs/create');
$menu->addMenuItem($addMenuItem);

/* Add a spacer. */
$spacerMenuItem = new SpacerMenuItem();
$spacerMenuItem->setName('Clubs');
$menu->addMenuItem($spacerMenuItem);

/* Add a placeholder for showing a list of clubs. */
$resourceMenuItem = new ResourceMenuItem();
$resourceMenuItem->setTarget('/clubs');
$menu->addMenuItem($resourceMenuItem);

return $menu;
```

As you can see, three `MenuItem` types are used:

 - `LinkMenuItem` - represents a simple link to another menu or page;
 - `SpacerMenuItem` - represents a simple text label;
 - `ResourceMenuItem` - represents a collection of resources.

The `ResourceMenuItem` is a placeholder for the actual items to show. When its target url is called, Auja expects a `Label305\Auja\Menu\Resource` object, containing a list of entries:

```php
$resource = new Resource();

/* Add Manchester United to the list. */
$item = new LinkMenuItem();
$item
    ->setName('Manchester United')
    ->setTarget('/clubs/1');
$resource->addItem($item);

/* Add FC Bayern Munchen to the list. */
$item = new LinkMenuItem();
$item
    ->setName('FC Bayern München')
    ->setTarget('/clubs/2');
$resource->addItem($item);

/* Provide a url to the next page of clubs. */
$resource->setNextPageUrl('/clubs?page=2');

return $resource;
```
<a name="page"></a> 
### Page

A page, defined by `Label305\Auja\Page\Page`, represents a panel to view and modify a single entry. The following example creates an edit page for the `Club` model:

```php
/* Retrieve the Club instance. */
$club = ...;

$page = new Page();

/* Add a header with a delete button. */
$pageHeader = new PageHeader();
$pageHeader->setText('Edit Club');

$deleteButton = new Button();
$deleteButton
    ->setText('Delete')
    ->setConfirmationMessage('Are you sure?')
    ->setTarget('/clubs/1')
    ->setMethod('DELETE');
$pageHeader->addButton($deleteButton);

$page->addPageComponent($pageHeader);

/* Add the form. */
$form = new Form();
$form
    ->setAction('/clubs/1')
    ->setMethod('PUT');

    /* Add a name text field.  */
    $nameFormItem = new TextFormItem();
    $nameFormItem
        ->setName('name')
        ->setLabel('Name')
        ->setValue($club->getName());
    $form->addFormItem($nameFormItem);
    
    /* Add a submit button. */
    $submitFormItem = new SubmitFormItem();
    $submitFormItem->setText('Submit');
    $form->addFormItem($submitFormItem);
    
$form->addPageComponent($form);
    
return $page;
```

## Developing

To start developing for Auja-PHP, do the following:
 - Clone the project;
 - Run `composer install`.
 
To run PhpSpec, execute `bin/phpspec run`.  
If you want to run code coverage locally, you need to execute the following:
 - `composer require henrikbjorn/phpspec-code-coverage:~0.2 satooshi/php-coveralls:~0.6`
 - `printf "\nextensions:\n  - PhpSpec\\\\Extension\CodeCoverageExtension" >> phpspec.yml`  

Do not commit these changes!

## License
Copyright 2014 Label305 B.V.

Licensed under the Apache License, Version 2.0 (the "License");  
you may not use this file except in compliance with the License.  
You may obtain a copy of the License at

[http://www.apache.org/licenses/LICENSE-2.0](http://www.apache.org/licenses/LICENSE-2.0)

Unless required by applicable law or agreed to in writing, software  
distributed under the License is distributed on an "AS IS" BASIS,  
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.  
See the License for the specific language governing permissions and  
limitations under the License.
