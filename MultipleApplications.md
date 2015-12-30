# Multiple Applications #

When working on a website or webapplication you will almost always be needing a seperate backend. This allows the user to update his or her own website.

To avoid duplicate code I have implemented multiple application support. Models will be shared among all the applications but an application has its own controllers and templates.

To add a new application simply create a new folder in the shumvc/apps folder. Within this folder create the folder: 'controllers', 'templates' and 'templates\_c'.

When you have a second application you will need to copy your index.php file and rename it to whatever fits you best. Then change the following:

```
define('APP_NAME', 'development');
```

To the name you gave the folder withing the apps folder.

That's all there is to it, good luck!