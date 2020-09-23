# das-wp-theme

## Roadmap
Release date is September 28, 2020

* [Product website](https://diversityavatarstickers.com/)
* [Staging website](http://staging.diversityavatarstickers.com)

This project contains the WordPress theme for Diversity Avatar Stickers (DAS)

FRONTEND 
* HTML
* CSS (SASS)
* JavaScript 
* ReactJS (on pause)

MIDDLE-TIER 
* PHP

## PLUGIN DEPENDENCIES
* Woocommerce

## SETTING UP LOCAL WORDPRESS
> *(iOS setup)* 
1. Download a local server environment such as MAMP. MAMP can be installed in both macOS and Windows. 
2. If you have not done so, **[download WordPress](https://wordpress.org/download/)**
3. After MAMP is installed navigate to the "/Applications/MAMP/htdocs" folder and unzip the Wordpress package there, and following the the instructions to install. 

## PROJECT STATUS
This project is currently in development. 

## CLONE REPOSITORY
```bash 
$ git init or $ git init dastheme
$ git pull https://github.com/dev-koalescedesigns/das-wp-theme.git

```
## INSTALLATION 
Before you move forward 
* Use a coding editor *(Visual Studio Code)*
* Have a local server MySQL environment *(I used MAMP)*

3. Extract files (if you are using MAMP, place files in htdocs folder)
4. To install all the [npm packages](https://docs.npmjs.com/cli/install/).
5. In the package.json

```bash
npm install git://github.com/dev-koalescedesigns/das-wp-theme.git
```
or 
```bash
npm install
```

6. You might have to configure the browserSync settings in the gulpfile.js file.

7. To build project 
```bash
npm gulp
```

8. Build your ReactJS *(TBD)*


## PUSH TO REPOSITORY
```bash
$ git init

$ git remote add origin git@github.com:dev-koalescedesigns/das-wp-theme.git

$ git push -u origin master

```
