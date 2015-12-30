# Setting Up Shumvc #

## 1. Obtaining the source ##
Currently there is no stable release of shumvc. But the source a available from the svn trunk. You should know how this works ;)

The source currently contains a helloworld app which I use for simple test purposes.

As soon as a stable release is available for download I will update this wiki.

## 2. Setting up your webserver ##
A basic webserver will do fine. Make sure apache's mod\_rewrite is enabled and the virtual host points to the www folder.

## 3. Configuring Shumvc ##
Setting up is easy, just make sure you properly configure the config.php file within the config directory. Also make sure the template\_c folder in the app folder has rwx attributes for all users. (chmod 777)

Important is the DEPLOYMENT\_URL. If you decided to let your vhost point to the shumvc folder instead of the web folder the index if found on /web/index.php so your DEPLOYMENT\_URL should be /web/.