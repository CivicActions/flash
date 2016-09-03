AJAX Leaderboard
================

A proof of concept of a Drupal module that creates a page, /ajax-leaderboard, 
with an embedded Angular app.  The angular app uses grun to build 
(see Developing section below).

./includes/js/demo.js contains some example callbacks to D8 REST apis.


## Developing

The angular app requires nodejs and npm to be built. To build the Angular app:
```
cd ./includes/js/client
npm install && bower install
grunt publish
# New files will be built in ./includes/js/client/dist
```