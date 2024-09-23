# WordPress Theme Development boilerplate

> [!IMPORTANT] 
> Hi :^) if you're reading this it means you're using my custom WP theme template. It has all the basics to begin working on a custom theme for WordPress. It was made by me (Nico) and heavily based on this wonderful course by [UsableWP](https://www.usablewp.com/learn-wordpress-theme-development/). I added many custom details and organized everything just how I like it, on top of setting up grunt tasks and an npm package structure to make development easier.

The project's structure is as follows:
- `_src`
    - This is the folder where the 'source code' of the template resides. **All edits should be made here.**
- `node_modules`
    - Self explanatory. If you don't have this folder then you didn't install the dependencies correctly (you should look into that).
- `dist / something-theme`
    - This is where the 'compiled' theme is located. All css and js is compressed and minified if possible. The PHP files and dependencies are copied to the correct location so WordPress can load the theme. This folder can be deleted anytime, as the grunt task for compiling the theme creates it again if absent.

## Quick guide
1. [Setup](#setup)
2. [Source folder structure](#source-folder-structure)
3. [Grunt tasks](#grunt-tasks)
    - [Configure global variables](#configure-global-variables)
    - [Run tasks](#run-tasks)
4. [Creating new templates and template parts](#creating-new-templates-and-template-parts)
    - [Page templates](#page-templates)
    - [Custom page templates](#custom-page-templates)
5. [Editing global styles](#editing-global-styles)
6. [Using custom fields with ACF](#using-custom-fields-with-acf)
    - [Defining and accessing custom fields and their values](#defining-and-accessing-custom-fields-and-their-values)
    - [Setting and editing the values](#setting-and-editing-the-values)
7. [Good HTML markup and CSS practices](#good-html-markup-and-css-practices)

## Setup
0. **Rename the theme by searching & replacing all instances of 'theme-name' in the project.**
1. Install npm dependencies. Most dependencies can be installed locally to this project, **but sass and grunt specifically sometimes require global installation to work properly**, so make sure they're both installed.
2. Develop the theme inside the `_src` folder.
3. An **SFTP connection** can be configured so that the theme can be deployed automatically to a server. If you're not interested in deploying the theme through SFTP you can skip this part. The host, port, and path to the themes folder in the server have to be changed in the grunt config (inside the `gruntfile.js` file), and an additional `.ftppass` file with the username and password is needed. This file is **ignored by git by default**, for security reasons, and should not be uploaded or shared anywhere. Running the `grunt deploy` task once all of this is configured will safely deploy the theme to the servers' `themes` folder.
4. Once the theme is ready, either upload the `dist/theme-name` folder directly to the site or to your local WP installation, or use the `grunt deploy` command to deploy it via SFTP (the connection has to be configured as described above).

> [!NOTE]
> The theme title, description, and other data visible in the WP admin when selecting the theme can be changed in the `style.scss` file in the theme's root folder. The theme image is optional and can be changed by swapping the `screenshot.png` image also present in the theme's root (Remember to put the image inside the `_src` folder! It will be copied over to the `dist` folder by grunt). Any image will do, but a 4:3 aspect ratio is recommended (880x660px is the recommended size).

## Source folder structure
The source code for the theme and all of its components resides in the `_src` folder.
- `/assets` is for libs (automatically added by npm), and other assorted files that might be needed from within the theme's code
- `/page-templates` is the folder to store all **custom** page templates ([read more about custom page templates here](https://developer.wordpress.org/themes/template-files-section/page-template-files/#creating-custom-page-templates-for-global-use)). Each of the templates inside this folder **must** include a comment at the start with the template's name, which must be unique.
- `/scripts` is for javascript files. Each file must be enqueued in the functions enqueue_scripts function separately.
- `/styles` is for scss files. This folder and all of its contents (alongside the template parts' specific scss files) will be compiled into one single optimized css file when the theme is compiled. This means the `/styles` folder should not be present in the final theme folder.
- `/template-parts` is for storing all of the template parts that make up the components of the website. There are subfolders to further categorize these components. Each individual component lives in its own separate folder, and can have its own `.scss` file to add specific styling to it.
- `/theme-config` is for php files related to custom settings and functions, post type setup, custom fields, shortcodes, etc. In short, these files are not html components that will be rendered on screen, but utility files for storing functions and setup stuff outside of the main `functions.php`

## Grunt tasks
This project has some grunt tasks configured to speed up theme development.

### Configure global variables
Inside the `gruntfile.js` file, the first object within the initConfig function contains all the configurable variables that will be used by all tasks. If SFTP deployment won't be used, all ftp variables can be ignored. The `dist_folder` property, however, is very important.
- If you want the theme to be compiled inside the `/dist` folder inside the same directory where you have cloned this repository, keep the value of the property as `dist/theme-name`.
- If you want the theme to be compiled directly to the `themes` folder of your local WP installation, copy the path to that folder and paste it. Remember to add the specific theme directory at the end of the path, not just the `/themes` root folder!

### Run tasks
- **`grunt` or `grunt default`:** This task will compile the theme for distribution. The css and js will be minimized and compressed. This means the code (specially javascript) can be difficult to debug.
- **`grunt deploy`:** It first runs the `default` task, then deploys the theme through SFTP. SFTP host and credentials must be set up first.
- **`grunt dev`:** Compiles the theme, but without minimizing `.css` and `.js` files for easier debugging.
- **`grunt dev-watch`** Runs the `dev` task and then starts watching the code for any changes. When a change occurs, the whole theme is automatically compiled again **except** for assets and libs, which are only copied over once at the start. The task can be cancelled at any time by entering `ctrl + c`.
- **`grunt newpart:path/to/part`:** Custom grunt task for creating new template parts. The last part of the path must be the part name. It automatically creates the parent folder, `.php` and `.scss` files, and imports the `.scss` to its parent folder's. It does **not** check whether or not it had been added before, so it can cause duplicate import statements. **Use with caution.**

## Creating new templates and template parts
> [!WARNING]
> When renaming or deleting files, be aware that the grunt tasks only **create** new files and **overwrite** existing files, but **do not** remove files that have been deleted or renamed. This means that, if you have renamed existing files, or deleted old files that are no longer used, **there might be duplicate files left behind in the `/dist` directory or the WP `/themes` directory.** Every now and then it's recommended to delete the `/dist` folder or the `/themes/theme-name` folder and recompile the theme from scratch to ensure those old files are no longer hanging there.

All template parts are stored inside the `/template-parts` folder. Each template part should have its own folder, in which its `.php` file resides. The component may, if necessary, also have its own `.scss` file to add extra styles to it. These `.scss` files must be `@import`ed into its parent folder's `_parent.scss` in order to be taken into account when compiling styles.

### Page templates
WordPress uses a **hierarchy-based** system to determine which template to use for each page, depending on its post type, taxonomy, term, id, slug, and other details. Please refer to the [WP Template Hierarchy](https://developer.wordpress.org/themes/basics/template-hierarchy/) for a full explanation on the naming convention.

![WordPress Template Hierarchy](https://i0.wp.com/developer.wordpress.org/files/2014/10/Screenshot-2019-01-23-00.20.04.png)

### Custom page templates
Pages (and custom post types with the right capabilities) can be assigned a custom page template to replace the basic `page.php`. These custom templates files **must** be within the `/page-templates` folder and **must** start with a comment that defines its Template Name (which must be unique) in order for WordPress to properly recognise them. When they're set up properly, they should appear in a drop-down selector in the menu at the right side of the screen when editing a page. They don't have to be included in the `functions.php` file or anywhere else: WordPress will look for them on its own.

## Editing global styles
"Global" styles (all `.scss` is compiled within the same `.css` file, so all styles are technically global) that are applied to many different places are stored inside the `/styles` folder. In order to be included into the compiled `.css` file, they must be `@import`ed into their parent folder's `_parent.scss` file, same as with the template parts' styles.

## Using custom fields with ACF
> [!WARNING]
> Some types of custom fields provided by the ACF plugin are limited to the pro (paid) version of the plugin. If a license is not available, check in the [documentation](https://www.advancedcustomfields.com/resources/) which types of fields are available.

[ACF (Advanced Custom Fields)](https://www.advancedcustomfields.com/) is a very useful plugin that extends the core functionality of WordPress' custom fields and allows developers and users to both define, declare, and use these fields in a much more advanced way.

### Defining and accessing custom fields and their values
ACF allows developers to create new custom fields in two ways. The first one is through the ACF option in the admin menu that shows up when the plugin is installed. Here you can create new field groups and edit existing ones in a visual and accessible way. The downside of this method is that **any administrator of the site can accidentally edit or delete the fields**, which will cause errors and confusion. On top of that, defining fields in this way saves them in the database, which means that you'll need to migrate the database's contents when switching environments.

The other way to define field groups and their contents is to [register them through PHP inside the theme](https://www.advancedcustomfields.com/resources/register-fields-via-php/). This will protect the content from being accidentally edited by non-programming-savvy editors or admins (group fields registered via PHP do not show up in the ACF section of the admin menu) and, since their declaration is part of the theme's code, they will be registered in any WordPress instance as soon as the theme is installed (like post types).

All of the ACF config php files are stored in `/theme-config/acf`. When creating a new field group, it is recommended to create a new `.php` file. All `.php` files within this folder will be automatically required by `functions.php`.

Accessing the fields' values from template parts or other parts of the code can be done with the `get_field()` and `get_sub_field()` functions. Repeaters, flexible content, and other types of fields that allow the user to add rows of content can also use the functions `have_rows()` and `the_row()` instead. Check the existing components or the [ACF plugin documentation](https://www.advancedcustomfields.com/resources/get_field/) for more info.

### Setting and editing the values
Once the field groups have been defined and associated to a valid location (post type, options page ...) the values of these fields can be set when editing the post in question.

## Good HTML markup and CSS practices
This is just an assorted list of tips and warnings I have come up with on the spot. There are probably many things I have missed. Always refer to the [MDN web docs](https://developer.mozilla.org/en-US/) when unsure about anything related to accessibility, semantic markup, or good practices in general.
- HTML ids should be unique. If a component is repeated several times in the same layout, make sure the id is different each time, or just don't use ids in these cases and use css classes instead.
- Headings are used to define the content's **hierarchy**. This means:
  - Each page **must have one, and only one, `<h1>` tag**.
  - You can't skip a heading level. If there's no `<h2>` heading, then you can't use a `<h3>` one.
- [HTML semantic elements](https://developer.mozilla.org/en-US/docs/Glossary/Semantics#semantic_elements) should be used when possible. No, there's no way to be 100% sure when it's correct to use them or not. Just use them when it makes sense.
- `<img>`, `<svg>` and other media elements must have a descriptive `alt=""` attribute. If they're meant to be ignored by screen readers, a null alt value is preferred.
- Rely on JavaScript as little as possible. JS can be disabled by the user in their browser's settings at any point. Any basic features (like navigation, or basic interactions) implemented making use of it will not work if the user doesn't allow it to execute. If it *can* be done without JS, do it without JS.
- Import as few files/libraries as possible and perform as few queries to the database as possible. Every single query and http request takes up time. If the files being requested are big (code libraries, unoptimized images) these can easily add up and tank the site's performance.