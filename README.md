# LinkedEntities plugin for CakePHP 3.x
[![Build Status](https://travis-ci.com/angelxmoreno/cakephp-linked-entities.svg?branch=master)](https://travis-ci.com/angelxmoreno/cakephp-linked-entities)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/d4ed026cc47d49619f6905775da67ef6)](https://www.codacy.com/app/angelxmoreno/cakephp-linked-entities?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=angelxmoreno/cakephp-linked-entities&amp;utm_campaign=Badge_Grade)
[![Maintainability](https://api.codeclimate.com/v1/badges/ce5001ca6c6d9eddaff1/maintainability)](https://codeclimate.com/github/angelxmoreno/cakephp-linked-entities/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/ce5001ca6c6d9eddaff1/test_coverage)](https://codeclimate.com/github/angelxmoreno/cakephp-linked-entities/test_coverage)
[![License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.txt)
[![Minimum CakePHP Version](https://img.shields.io/badge/CakePHP-3.x-red.svg)](https://cakephp.com/)
[![Minimum PHP Version](http://img.shields.io/badge/php-%3E%3D%205.6-8892BF.svg)](https://php.net/)

LinkedEntities allows the ability to associate your User Entities with any other Entities ( including self referencing )
by a category type. It adds shortcut functions to your User Table for ease of use.   

## Features
- Ability to define User-to-Entity relationship via a polymorphic table
- Define relationship by category
- Automatic relationship of Entity-to-User
- Shortcut methods based on relationship name

## Examples
```php
$this->Users->addStarredProject($user, $project);
$this->Users->removeFollowedUser($user, $otherUser);
```

## Requirements
- CakePHP 3.x
- PHP >=5.6

## Installation

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

The recommended way to install composer packages is:

```sh
composer require angelxmoreno/cakephp-linked-entities
```
Next you need to [load the plugin](http://book.cakephp.org/3.0/en/plugins.html#loading-a-plugin) by adding the following to your `config/bootstrap.php` file:
```php
// config/bootstrap.php
Plugin::load('LinkedEntities', ['bootstrap' => true]);
```

Finally, create the required tables using `cakephp/migrations`:
```bash
bin/cake migrations migrate -p LinkedEntities
```

Or import the sql schema found in `config/schema`.

## Setup
1. In your `config/app.php` define a new config key called `LinkedEntities` ( see [configuration](#configuration) )
2. In your UsersTable add the `LinkedEntities.LinkableEntityUser` behavior like so:
```php
$this->addBehavior('LinkedEntities.LinkableEntityUser');
```
3. Optionally add the `LinkedEntities.LinkableEntity` behavior to the corresponding Table classes defined in your config. i.e:
```php
$this->addBehavior('LinkedEntities.LinkableEntity');
```

## Configuration
Sample configuration:
```php
// config/app.php
'LinkedEntities' => [
    'UserModel' => 'Users',
    'link_types' => [
        'star' => 1,
        'follow' => 2,
    ],
    'links' => [
        'StarredProjects' => [
            'name' => 'UserStars',
            'className' => 'Projects',
            'linkType' => 1
        ],
        'FollowedProjects' => [
            'name' => 'Followers',
            'className' => 'Projects',
            'linkType' => 2
        ],
        'FollowedUsers' => [
            'name' => 'Followers',
            'className' => 'Users',
            'linkType' => 2
        ]
    ]
]
```
With the configuration above ( after adding the behavior ) you will have 6 new methods available to your UsersTable:
1. $this->Users->addStarredProjects($user, $project);
2. $this->Users->removeStarredProjects($user, $project);
3. $this->Users->addFollowedProjects($user, $project);
4. $this->Users->removeFollowedProjects($user, $project);
5. $this->Users->addFollowedUsers($user, $otherUser);
6. $this->Users->removeFollowedUsers($user, otherUser);

#### UserModel parameter
A string defining the plugin.name of your UsersTable ( defaults to `Users` )

#### link_types
An array as a int => string ( this saves the int provided under the table column `type` )

#### links
An array as relationship name => settings
Settings have the following keys
 - name: The name of the relationship from the perspective of the linked entity ( the reverse relationship name )
 - className: The name of the table to associate the user to
 - linkType: the int value corresponding to one of the defined `link_types`

## Reporting Issues
If you have a problem with DebugKit please open an issue on [GitHub](https://github.com/angelxmoreno/cakephp-linked-entities/issues).

## License
This plugin is offered under an [MIT license](https://opensource.org/licenses/mit-license.php).
