var fs = require('fs');
var config = require('favicons').config;
config.html = require('./favicons/html.json');
var favicons = require('favicons'),
  source = './assets/images/favicon.png',           // Source image(s). `string`, `buffer` or array of `{ size: filepath }`
  configuration = {
    appName: "Nyt Project",                  // Your application's name. `string`
    appDescription: "Nyt Project",           // Your application's description. `string`
    developerName: "FrisorWeb",
    developerURL: "http://frisor.dev",
    path: "/app/themes/frisor/dist/images/",
    url: "/app/themes/frisor/dist/images/",
    display: "standalone",
    orientation: "portrait",
    version: 1.0,
    logging: true,
    online: false,
    icons: {
      android: true,              // Create Android homescreen icon. `boolean`
      appleIcon: true,            // Create Apple touch icons. `boolean`
      appleStartup: true,         // Create Apple startup images. `boolean`
      coast: true,                // Create Opera Coast icon. `boolean`
      favicons: true,             // Create regular favicons. `boolean`
      firefox: true,              // Create Firefox OS icons. `boolean`
      opengraph: false,           // Create Facebook OpenGraph image. `boolean`
      twitter: true,              // Create Twitter Summary Card image. `boolean`
      windows: true,              // Create Windows 8 tile icons. `boolean`
      yandex: true                // Create Yandex browser icon. `boolean`
    }
  },
  callback = function (error, response) {
    if (error) {
      console.log(error.status);  // HTTP error code (e.g. `200`) or `null`
      console.log(error.name);    // Error name e.g. "API Error"
      console.log(error.message); // Error description e.g. "An unknown error has occurred"
    }
    //console.log(response.images);   // Array of { name: string, contents: <buffer> }
    //console.log(response.files);    // Array of { name: string, contents: <string> }
    // console.log(response.html);     // Array of strings (html elements)
    for (var _i in response.images) {
      fs.writeFile("./dist/images/" + response.images[_i].name, response.images[_i].contents);
    }
    for (var _i in response.files) {
      fs.writeFile("./dist/images/" + response.files[_i].name, response.files[_i].contents);
    }
    fs.writeFile("./templates/favicon.html", response.html.join(""));
    console.log('Complete!');
  };
favicons(source, configuration, callback);
