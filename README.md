# pontoweb
Clock in/out application written in PHP 5.6 with SQLite as the database backend.

# description
Uses unix timestamp to the time accounting.
It has one hardcoded administrator account which manages all the other ones.

The **regular account** user is capable of:
- login
- logoff
- clock in and out [register presence]
- delete account

The panel for the regular user shows:
- the username
- if it is clocked in/out
- how many hours it has clocked in
- and the last time it was clocked in.

The **admin** one shows the same info for all the users, and is capable of **almost everything as the regular but clock in/out**.

# deploying
- It requires the **php code** and a **web server** like apache or nginx.
    - but for testing just do a `php -S localhost:8080 -t src`
- The database template is in database.sql.

All the configuration for the application 'Classes\Config.php' class file.
To generate the hash for the passes you need just to paste this in your shell
- `php -r "echo hash('sha256', 'YOUR-PASSWORD')\n;" `.

# disclaimer
This is an amauter project (and by that I say ugly code, no architeture and structure of the app) which most of the purpose was to learn a
little of PHP. It may or may not have real application. Feel free to try.
