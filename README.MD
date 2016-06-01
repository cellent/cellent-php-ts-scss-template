# PHP/TypeScript Template

## Setup Environment
These steps only have to be done once per system.

### Install Composer
See [https://getcomposer.org/download/](https://getcomposer.org/download/ "Install Composer").

### Install npm
See [https://docs.npmjs.com/getting-started/installing-node](https://docs.npmjs.com/getting-started/installing-node "Install npm").

### Install TypeScript
See [https://www.typescriptlang.org/docs/tutorial.html](https://www.typescriptlang.org/docs/tutorial.html "Install TypeScript").

Short version: `npm install -g typescript`

### Install TSLint
See [https://palantir.github.io/tslint/](https://palantir.github.io/tslint/ "Install TSLint").

Short version: `npm install -g tslint`

### Install Typings
See [https://github.com/typings/typings](https://github.com/typings/typings "Install Typings").

Short version: `npm install -g typings`

### Install Sass
See [http://sass-lang.com/install](http://sass-lang.com/install "Install Sass").


## Setup Project
* edit `composer.json`:
    * `name`
    * `description`
    * namespaces for `src/` and `tests/PhpUnit/` (you'll also have to adapt the PHP files in both the `src` and the `tests` folder)
* edit `installer.json`:
    * `name`
    * `packagename`
* edit `package.json`:
    * `name`
    * `description`
* `composer install` (PHP dependencies)
* `composer compile-ts` (compile TypeScript to JavaScript)
* `composer compile-sass` (compile Sass to CSS)
* `typings install` (TypeScript type definitions)
* `npm install` (TypeScript/JavaScript testing stuff)
* link a virtual host to the public/ folder
* (optional) set the application environment to 'development'
    * if you're using Apache, add `SetEnv APP_ENV development` to the VirtualHost's configuration


## Development

### Adding Type Definitions
This example shows how to install the jQuery type definition, which has already been done in this template project.
* `typings search jquery`
* find package `jquery` in results
* `typings install dt~jquery --global --save`

At the time of writing this, the jQuery type definition is only available from Source "dt", therefore `dt~` and `--global` are necessary in the install command.
For more information see [https://github.com/typings/typings](https://github.com/typings/typings "Typings GitHub Page").

### Linting/Compiling TypeScript and Sass
During development, you should really have your IDE configured to do those tasks.
If you, for some reason, need to run them by hand, you can do so with `composer lint-ts`, `composer compile-ts`, and `composer compile-sass`, respectively.

## Testing

### PhpUnit
`./vendor/bin/phpunit`

### TypeScript
`karma start`


## Deployment

### Configuration
* set deployment url in `installer.json`

### Building
* `vendor/bin/installer package`

### Installation

#### First Time
* create apps folder (e.g. `mkdir ~/apps`)
* `cd <APPS_DIRECTORY>`
* `mkdir <PACKAGENAME>`
* `cd <PACKAGENAME>`
* create `installer.json` with the following content:
```
{
    "name" : "<APP_NAME>",
    "packagename" : "<PACKAGENAME>",
    "deployment" : {
        "url" : "<DEPLOYMENT_URL>"
    },
    "config_dir" : "config",
    "meta" : {
    }
}
```
* `cd ..`
* `curl <DEPLOYMENT_URL>/download > installer.phar`
* `php installer.phar install <PACKAGENAME> <VERSION>`
* make sure the virtual host links to `<APPS_DIRECTORY>/<PACKAGENAME>/current/public/`

#### Subsequent Installations
* `cd <APPS_DIRECTORY>`
* `php installer.phar install <APP_NAME> <VERSION>`
