Please Follow below URL for detail online documentation
https://nubra-ui.hencework.com/

Jampack is loaded with many operational, strategical, analytical and collaborative applications.

    File Structure
    HTML
    ├── 
    │   └── dist
    │     └── css
    │     └── fonts
    │     └── img
    │     └── js
    │   └── src
    │     └──scss
    │    	  └── apps.scss
    │    	  └── drawer.scss
    │    	  └── footer.scss
    │    	  └── header.scss
    │		  └── horizontal-menu.scss
    │    	  └── mixins.scss
    │    	  └── nav.scss
    │    	  └── navbar-menu.scss
    │    	  └── style.scss
    │    	  └── variables.scss
    │    	  └── vertical-classic-menu.scss
    │    	  └── vertical-icon-menu.scss
    │   └── vendors
    │       └── All Required plugins files
    │   └── All Html Pages
    │   └── .jshintrc
    │   └── Gruntfile.js
    │   └── gulpfile.js
    │   └── package.json
    │   └── package-lock.json
    └── 	
  
Installation

To get started, you need to follow some specific steps ( Use of these tools is completely optional.)

     Node.js and NPM. You can download Node.js from here https://nodejs.org. Npm comes bundled with Node.js.

     At last install grunt using below command line

    npm install -g grunt-cli
    npm install grunt --save-dev

After installing all the required frameworks, components and dependencies, go to the root folder of and   run the following commands from the command line:

    npm install
    grunt dist
    grunt

If everything was installed correctly, you should see the jQuery version of Jampack running in http://localhost:9000/
Above all procedures are optional you can directly use the compiled Demo files which we provided you.


Installation with Gulp
														
    npm install gulp-cli -g
    npm install gulp --save-dev
After installing all the required frameworks, components and dependencies, go to the root folder of and run the following commands from the command line:
														
    npm install
    gulp vendors
    gulp
													