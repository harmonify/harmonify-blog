<div align="center">

# Harmonify Blog
</div>
<p align="center">
<a href="https://harmonify-blog.herokuapp.com/" target="_blank"><img src="https://raw.githubusercontent.com/harmonify/harmonify-blog/main/.github/img/preview.png" width="600"></a>
</p>

_Disclaimer: All users data previewed on the image are fake data generated with FakerPHP._
## Introduction

Harmonify Blog is a simple blog project I built when learning Laravel 8. I hosted this website at Heroku. You may visit the website at https://harmonify-blog.herokuapp.com.
To log in, you may use some accounts with different roles [below here](#roles).


## Two Branches ?

You might notice there are 2 branches in this repository. One is `main`, and the other one is `deploy`. In some sense, both of them are functionally equal. The only difference is how they are serving the images to the end users.

The `main` branch utilize local filesystem to manage files, like post thumbnails when they are created or updated. This branch is ready to switch from local filesystem to another filesystem, _may I change it at a later date_, by editing only the config files.

Meanwhile, the `deploy` branch don't utilize any filesystem at the moment to serve post thumbnails to the end users. The reason is because I hosted this website with Heroku free services. Heroku dynos are stateless which means their filesystem is ephemeral. I don't plan to use something like Amazon S3, hence I dump all those images on my own Discord channel and store only the image URLs. _lol_

## Roles

There are 3 roles available by default.  
User, administrator, and superuser role.
### User
> username: user  
> password: user  

List of all user permissions:
* Can create, update, or delete their comments. _(not finished)_

### Administrator
> username: admin  
> password: admin  

List of all admin permissions:
* All of User role permissions.
* Can access dashboard.
* Can view, create, update, or delete their posts from dashboard.
* Can view, create, update, or delete categories from dashboard.

### Superuser
> username: superuser  
> password: superuser  

List of all superuser permissions:
* All of Admin role permissions.
* Can view, create, update, or delete all posts from dashboard.
* Can view, update, or delete another users from dashboard.
* Can view, create, update, or delete roles from dashboard. _(not finished)_
* Can view or update settings from dashboard. _(not finished)_

## Components

### Tech & Frameworks
These are technologies I used to build up this website.
* [PHP 8.0.6](https://www.php.net/)
* [Laravel 8.54](https://laravel.com/)
* [MariaDB 10.4.19](https://mariadb.org/)
* [Bootstrap CSS 5.1.0](https://getbootstrap.com/)
* [Bootstrap Icons 1.5.0](https://icons.getbootstrap.com/)
* [Feather Icons 4.28.0](https://feathericons.com/)
* [Masonry JS 4.2.2](https://masonry.desandro.com/)

### Other Packages

These are the packages I used which are not included with the Laravel Framework itself, for app development or functionality.
* [cretueusebiu/valet-windows](https://github.com/cretueusebiu/valet-windows)
* [itsgoingd/clockwork](https://github.com/itsgoingd/clockwork)
* [cviebrock/eloquent-sluggable](https://github.com/cviebrock/eloquent-sluggable)
* [mailchimp/marketing](https://github.com/mailchimp/mailchimp-marketing-php)
* [marvinlabs/laravel-discord-logger](https://github.com/marvinlabs/laravel-discord-logger)

## TODO

List of things I could improve on this website but didn't.
- [ ] Redesign Homepages,
- [ ] CommentResourceController,
- [ ] RoleResourceController,
- [ ] Roles menu on the dashboard,
- [ ] SettingsController,
- [ ] Settings menu on the dashboard,
- [ ] etc.
