Clunch Back Office
========================

Symfony 3.4 Project

Dependencies
--------------

  * **Basic Symfony v3.4 Setup**
  * **FOSUserBundle v2.0**
  * **Sonata v3.35**
  * **Sonata Media Bundle v3.13**
  * **JMSSerializerBundle v1.13**
  * **FOSRestBundle v2.5**
  * **NelmioCorsBundle v1.5**
  * **LexikJWTAuthenticationBundle v2.6**

--------------

Setup
--------------

### Install
```shell
  $ composer install
  $ php bin/console assets:install
  $ php bin/console doctrine:schema:update --force
```

***
### Create a SUPER-ADMIN user
```shell
  $ php bin/console fos:user:create admin --super-admin
```
> Password: **clunch**
***

### Launch
```shell
  $ php bin/console server:run
```
