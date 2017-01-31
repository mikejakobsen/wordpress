# Wordpress Theme


![Mike](http://www.mikejakobsen.com/mike.png)


##### mikejakobsen.com 
	
[Github.com/mikejakobsen](http://www.github.com/mikejakobsen)
[Dribbble.com/mikejakobsen](http://www.dribbble.com/mikejakobsen)
[Twitter.com/mikejakobsen](http://www.twitter.com/mikejakobsen)

### Install

1. Copy `.env.example` to `.env` and update environment variables:
  * `DB_NAME` - Database name
  * `DB_USER` - Database user
  * `DB_PASSWORD` - Database password
  * `DB_HOST` - Database host
  * `WP_ENV` - Set to environment (`development`, `staging`, `production`)
  * `WP_HOME` - Full URL to WordPress home (http://example.com)
  * `WP_SITEURL` - Full URL to WordPress including subdirectory (http://example.com/wp)
  * `AUTH_KEY`, `SECURE_AUTH_KEY`, `LOGGED_IN_KEY`, `NONCE_KEY`, `AUTH_SALT`, `SECURE_AUTH_SALT`, `LOGGED_IN_SALT`, `NONCE_SALT`

  If you want to automatically generate the security keys (assuming you have wp-cli installed locally) you can use the very handy [wp-cli-dotenv-command][wp-cli-dotenv]:

      wp package install aaemnnosttv/wp-cli-dotenv-command

      wp dotenv salts regenerate

  Or, you can cut and paste from the [Roots WordPress Salt Generator][roots-wp-salt].

2. Add theme(s) in `web/app/themes` as you would for a normal WordPress site.

2. Set your site vhost document root to `/path/to/site/web/` (`/path/to/site/current/web/` if using deploys)

3. Access WP admin at `http://example.com/wp/wp-admin`
