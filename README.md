
# My very first Wordpress theme _(it shows)_

Built on _s, a very barebones Wordpress starter theme.

## Cats!

![Featured Cat](https://krisztin.github.io/assets/img/wp-shelter-header.png)

## Things I've learned so far

* Setting up a project with automatic Sass build (with npm and node-sass)
* Handle permission errors otherwise known as '777 is your last hope'.
* Create functions i.e. adding thumbnail support, a custom post type, scripts and stylesheets (Google fonts and Font Awesome).
* Create a custom post type (Cats) with custom fields (with ACF)

![Custom field values displayed](https://krisztin.github.io/assets/img/wp-shelter-acf.png)
* Renaming a menu item and post type in the backend (Posts -> News).
* Using WP_Query to display a specific (custom) post/page with a specific custom field value (featured cat template-part)

![Featured Cat](https://krisztin.github.io/assets/img/wp-shelter-featured.png)
* Creating and adding a template-part (content-featured.php)
* Inserting an item within looped posts at a set place. (CTAs on page-cats)

![CTA among cat listings](https://krisztin.github.io/assets/img/wp-shelter-cta.png)
* Material design system (only the theory and inspiration for buttons but will definitely use the code/elements in a future project).
* Sometimes ACF does not play ball or how I have spent hours trying to make a query for a filter to work based on a custom field only to realise that for some reason I could not access those columns in the table. Adding a new field magically solved the issue.

## Still to come

* Pages: Donate, News, Foster, Volunteer, Events, Contact
* Filters: I'll probably use taxonomies and categories to filter cats, news, volunteer and other listing pages. Custom fields are also an option
  * Went with custom fields. One is working so far (on master: page-cats.php) the rest and fine tuning is happening on a branch ([catfilters](https://github.com/krisztin/wp-shelter-theme/pull/1))

![Filters. Functional but not very pretty](https://krisztin.github.io/assets/img/wp-shelter-filters.png)

## Nice to haves aka massive projects to be done

* Stripe integration with all the hooks, actions, bells and whilstles.
  * [Pull Request](https://github.com/krisztin/wp-shelter-theme/pull/2) - Slooowly getting there. Need to create a form plugin to ensure proper POST
* System for recurring donations (GoCardless?).
* Shop (virtual shop for virtual gifts that could be bought for a cat).
* Google Tag Manager integration.

## Resources

[Wordpress Codex Functions Reference](https://codex.wordpress.org/Function_Reference)

[Wordpress Hierarchy](https://wphierarchy.com/)

[Material Design](https://material.io/)

[Awesome cat icons](https://www.flaticon.com/packs/kitty-avatars-2)

Google, lots and lots of Google


### More about _s

Hi. I'm a starter theme called `_s`, or `underscores`, if you like. I'm a theme meant for hacking so don't use me as a Parent Theme. Instead try turning me into the next, most awesome, WordPress theme out there. That's what I'm here for.

My ultra-minimal CSS might make me look like theme tartare but that means less stuff to get in your way when you're designing your awesome theme. Here are some of the other more interesting things you'll find here:

* A just right amount of lean, well-commented, modern, HTML5 templates.
* A helpful 404 template.
* A custom header implementation in `inc/custom-header.php` just add the code snippet found in the comments of `inc/custom-header.php` to your `header.php` template.
* Custom template tags in `inc/template-tags.php` that keep your templates clean and neat and prevent code duplication.
* Some small tweaks in `inc/template-functions.php` that can improve your theming experience.
* A script at `js/navigation.js` that makes your menu a toggled dropdown on small screens (like your phone), ready for CSS artistry. It's enqueued in `functions.php`.
* 2 sample CSS layouts in `layouts/` for a sidebar on either side of your content.
Note: `.no-sidebar` styles are not automatically loaded.
* Smartly organized starter CSS in `style.css` that will help you to quickly get your design off the ground.
* Licensed under GPLv2 or later. :) Use it to make something cool.
