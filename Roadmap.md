# Shumvc - Roadmap #
This documents intents to provide information about what functionality the upcoming (and released) versions of shumvc have to offer. Released versions contain the revision number.
## 0.1 (rev #29) ##
This version is a basic setup for shumvc. It provides a limited but useful amount of functionality, these include:

  * FrontController pattern
  * Object Relational mapping (Doctrine)
  * Template engine (php-serpent)
  * single point of configuration

## 0.2 (rev #37) ##
This version adds several key functions to shumvc.

  * multiple aplications

## 0.2.2 ##
I decided to reconsider the whole design of the framework. This so it will be easier to work with and develop. That's why I have decided to fix all the current bugs (and issues posted here).
This will be the last release of the project in it's current form


## 0.3 ##
The next design of the mvc will be all according to the philosophy. This means some things will change:
**Strict Frontcontroller pattern (j2ee)** leave out orm & template engines
**create a caching mechanism (which can be turned on/off)** create a plugin platform for use of orm and template engines
**config through xml** url also though index.php?page=foo when mod rewite isn't enabled
**fully commented using php documentor** fully documented in wiki


## Beyond ##
Things i'm thinking of implementing are among others:
  * Documentation (wiki) of system requirements
  * Dynamic URL's
  * Form factory for easy setting up forms
  * Scripts for easy CRUD generation
  * Scripts for initial application setup

If you have any ideas about functionality which you would like to see please describe them in a _New Issue_ under the _Issues_ tab.