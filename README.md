# Music App Demo

## Overview

I have used this exercise as a way to learn around some of the tools and frameworks being used, and look into some of the options for APIs available. As such, it may be more complex than required, but please let me know if it is way off what was expected.

It uses a variety of tools, some familiar to me, some a bit familiar, and some much less so.

- [Phinx](https://phinx.org/)
- [Slim 3](https://www.slimframework.com/)
- [Eloquent ORM](https://www.slimframework.com/docs/v3/cookbook/database-eloquent.html)
- [DotEnv](https://github.com/vlucas/phpdotenv)
- [Postgres 11](https://www.postgresql.org/)
- [PHP](http://php.net/)
- [Vagrant](https://www.vagrantup.com/)
- [Apache](https://httpd.apache.org/)
- [PHPUnit](https://phpunit.de/)
- [Composer](https://getcomposer.org/)
- [Git](https://git-scm.com/)
- [Postman](https://www.getpostman.com/)
- [Swagger](https://swagger.io)
- [JSON API](https://jsonapi.org/)

Api Running Instructions are to be found below.

## Server Running Instructions - Vagrant

Requires Vagrant and a Virtualisation Engine

https://www.vagrantup.com/downloads.html
https://www.virtualbox.org/wiki/Downloads

Once installed, you can navigate to the root directory of this project (with the VagrantFile), and run
```
vagrant up
```
This will provision a vagrant server with ubuntu, php, postgres, apache and the slim framework. It will also create and seed the database, and bring in the composer dependencies.

There will be a lot of commands executed, with information shown in red or green. There shouldn't be anything to worry about, but the check is whether you reach the 'Vagrant Up' message, and there are no exit codes reported.

If anything untoward occurs, please let me know.

All being well, it will allow you to curl to the api and start making requests. Further instructions can be found below.

## Server Running Instructions - Other

To set this up without vagrant requires a few hoops to create the expected environment - a postgres db with the required roles and db, composer run to pull down the dependencies, and so on. If necessary these steps can be determined from the VagrantFile.

## Source

This app was not started from scratch. I looked for a slim framework api that was available to use and decided on this one:

https://github.com/tuupola/slim-api-skeleton

It looked good in terms of a RESTful api with middleware to handle some authentication and CORs.

I took a copy of the project using composer, rather than forking via git.

While some similarities remain, I have tried not to lift pieces wholesale, and replace, or modify what was there. Parts which are similar as as follows:

 - The overall folder structure of the project
 - The phinx.yaml structure is as before
 - VagrantFile log permissions
 - The env file structure
 - public/.htaccess is the same
 - The Monolog dependency is the same

I have taken out some pieces which would have been lifted directly, such as some of the middleware, to not give the impression that these were my pieces, but also to allow me time to understand fully their purpose.

At the same time, there will always be some similarities as you are looking to achieve the same goal.  

In the original project, the vagrant was a Centos server running Mariadb, and this was switched over to ubuntu 18.04 running Postgres.

Please feel free to compare and contrast against the original.

## Learning

There was a lot of learning to get up to speed with the technologies used here, which inevitably slowed me down, and restricted the time I had to focus on some of the aspects - unit tests, auth, documentation

The following I have not used before, but was very interested to learn about them:

 - Phinx
 - Slim
 - Eloquent ORM
 - DotEnv
 - Postgres
 - Swagger.io
 - JSON API

## Limitations / Further Work

As mentioned, a lot of this was new, and there will always be areas to improve following a review. There were sacrifices to get postgres, slim and apache up and running, which wouldn't be desirable in a production environment.

There is a lot more that could be done around the authentication, and middleware aspects of the api.

The database indexes and constraints are not complete - there is no duplicate check on names for example.

The trackartist and albumartist routes are not present.

There is probably a better way to implement the request validation.

I would like to avoid repeating the routes for each model.

Improved documentation, including endpoint documentation, using swagger or postman

Naturally, I could have continued with this, but had to draw a line somewhere.

Some further developments include:

 - https://johannespichler.com/implicit-model-binding-in-slim-apis/
 - https://jwt.io/introduction/
 - https://packagist.org/packages/gofabian/negotiation-middleware


## Server Running Instructions

To SSH onto the running server, from the directory root use:

```
vagrant ssh
```

The URL is 192.168.50.52

The postgres database details are:
- User: musicapp
- PW: musicapp
- DB: musicapp_dev

(Internal to vagrant server)

The API Basic Authentication is:
- User: musicapp
- PW: notasecurepw

## API Running Instructions

The basic routes are:
  - artists
  - genres
  - tracks
  - albums

For now, albums is fully formed, and the others are just have the 'get all' route defined.

Each will ultimately follow the same pattern.

They all use the same authentication, which at the moment is limited to basic authentication (cleartext).

There is incomplete api documentation, generated using Postman, available [here](https://documenter.getpostman.com/view/6222868/Rzn8PhFj)

**Albums**

_GET all_
```
curl "http://192.168.50.52/albums" \
    --request GET \
    --include \
    --insecure \
    --header "Content-Type: application/json" \
    --user musicapp:notasecurepw
```
_GET by ID_

```
curl "http://192.168.50.52/albums/1" \
    --request GET \
    --include \
    --insecure \
    --header "Content-Type: application/json" \
    --user musicapp:notasecurepw
```

_GET by Title/Name_

```
curl "http://192.168.50.52/albums/Garden%20of%20Delete" \
    --request GET \
    --include \
    --insecure \
    --header "Content-Type: application/json" \
    --user musicapp:notasecurepw
```

_POST New_

```
curl "http://192.168.50.52/albums" \
     --request POST \
     --include \
     --insecure \
     --header "Content-Type: application/json"\
     --user musicapp:notasecurepw \
     --data '{"title":"Brand New Album", "release_date": "2017-11-21","compilation": 0, "genre_id": 1, "description": "A brand new album by an artist"}'
```

_PUT/PATCH existing by ID_
```
curl "http://192.168.50.52/albums/2" \
     --request PUT \
     --include \
     --insecure \
     --header "Content-Type: application/json"\
     --user musicapp:notasecurepw \
     --data '{"title":"Brand New Album New Name"}'
```
_Delete existing by ID_

```
curl "http://192.168.50.52/albums/1" \
    --request DELETE \
    --include \
    --insecure \
    --header "Content-Type: application/json" \
    --user musicapp:notasecurepw
```
