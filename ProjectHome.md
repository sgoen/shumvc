# Shumvc is a simple, but feature rich, mvc framework written in php. #

I simply use this mvc to learn more about programming php. Ive always used Symfony so this tends to look like it a little bit.

_Today, 9th of March, I added support for multiple applications. If your interested in this functionality make sure you have at least [revision 37](https://code.google.com/p/shumvc/source/detail?r=37). Documentation will be up soon._

## Currently under development ##
### Easy configurable HTML Form helper ###
Im looking into several open-source projects which provide this functionality to decide if this should be programmed from scratch or just can be implemented like doctrine and serpent.
### Dynamic URL ###
At this moment the mvc will link your url to a specific controller and function. But in future releases it should be possible to use dynamic urls for database access.



## Things for future development ##
  * Caching
  * Scripts for easy set up (crud generation and such)
  * User permissions

For object relational mapping doctrine 1.2.1 is used, more information about doctrine can be found on http://www.doctrine-project.org/

Serpent 1.2.4 is used as template engine. For more information about this engine you can visit http://code.google.com/p/serpent-php-template-engine