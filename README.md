# Shankers Invitational

The website for the Shankers Invitational golf tournament (ShankersInvitational.com): players, seeding events, leaderboards, tournament info, photos and an admin area for entering scores.

It's a PHP + MySQL site from 2013–2021, updated in 2026 to run on PHP 8.6. This repo runs it locally in Docker, so you don't need PHP or MySQL installed.

## What's in here

| Path | What it is |
|---|---|
| `shankersinvitational/` | The website itself (PHP pages, images, CSS, JS, `admin/` area) |
| `shankersinvitational/.htaccess` | Short URLs used by the menus (`/players`, `/players/<nickname>`, `/leaderboard`) |
| `db/shankersinvitational.sql` | Database backup from January 2021 |
| `db/zz-add-years.sql` | Adds years 2022–2026 to the `year` table |
| `Dockerfile` | Web server: Apache + PHP 8.6 |
| `docker-compose.yml` | Starts the web server and the database together |

## Requirements

- [Docker Desktop](https://www.docker.com/products/docker-desktop/) (running)
- Git

## Getting started

1. Get the code:

   ```bash
   git clone https://github.com/julianstevenson/shankersinvitational.git
   cd shankersinvitational
   ```

2. Start the site:

   ```bash
   docker compose up -d --build
   ```

   The first start takes a minute or two: Docker downloads the images, builds the web server, and loads the database from `db/`.

3. Open **http://localhost:8080**. The admin area is at **http://localhost:8080/admin/**.

## Everyday commands

Run these from the repo folder.

| Task | Command |
|---|---|
| Start | `docker compose up -d` |
| Stop (data is kept) | `docker compose down` |
| See if it's running | `docker compose ps` |
| Web server logs (PHP errors) | `docker compose logs -f web` |
| Reset the database to the backup | `docker compose down -v` then `docker compose up -d` |
| Rebuild after changing the `Dockerfile` | `docker compose up -d --build` |

Changes to files in `shankersinvitational/` show up as soon as you refresh the browser. There's no need to restart.

## Database

- Database name: `shankersinvitational`
- From your Mac (TablePlus, Sequel Ace, etc.): host `127.0.0.1`, port `3307`, user `shankers`. The password is in `docker-compose.yml`.
- Command line:

  ```bash
  docker compose exec db mariadb -ushankers -p shankersinvitational
  ```

The SQL files in `db/` only run when the database is created for the first time, or after `docker compose down -v`. Changes made through the admin pages are stored in a Docker volume and survive restarts.

To save a fresh backup of the current data:

```bash
docker compose exec db mariadb-dump -ushankers -p shankersinvitational > db/backup-$(date +%F).sql
```

## PHP version

The site runs on **PHP 8.6** (the latest release, November 2026). It was originally written for PHP 5, and the 2026 upgrade changed:

- **Database calls:** the old `mysql_*` functions (removed in PHP 7) are replaced with `mysqli`. All connection code is in `dbutils.php`. The pages use small wrappers (`db_fetch_assoc`, `db_num_rows`, `db_data_seek`) that quietly return nothing if a query fails, like PHP 5 did, instead of crashing the page.
- **Short tags:** `<?` became `<?php` everywhere.
- **`split()`** (removed in PHP 7) became `explode()` in `utils.php`.
- **Two PHP 8 errors fixed:** `form.php` now stops after redirecting, and `admin/competitions_update.php` no longer adds a number to a string.
- **Lenient SQL mode:** the code relies on MySQL 5.5's old behaviour (for example, adding a player without a Golflink number), so `dbutils.php` turns off strict mode for its connection.

Database settings can be overridden with the environment variables `DB_HOST`, `DB_USER`, `DB_PASSWORD`, `DB_NAME` and `DB_PORT`. The defaults match `docker-compose.yml`, and the code connects to `127.0.0.1`. In `docker-compose.yml`, the web container shares the database container's network so that address works. That's also why port 8080 is published on the `db` service.

PHP warnings (such as undefined variables, which the old code has plenty of) aren't logged, so that `docker compose logs web` shows only real errors. To see everything, change `error_reporting` in the `Dockerfile` to `E_ALL` and rebuild.

## Notes

- **Keep this repo private.** `dbutils.php` contains the database password from the old live host, and the SQL backup holds players' personal details. If those passwords are still used anywhere, change them there.
- The current competition is set in the `currentcomp` table, which you can change on the admin Competitions page. The home page countdown and the player lists use it.
- Competitions, players and scores added through the admin pages live only in the Docker database, not in this repo. Use the backup command above to keep a copy.
- The admin area has no login. Only the two score-entry pages (`scores_update.php`, `seedingscores_update.php`) ask for a password before saving, and that password is written in the code.

## History

- `2020` – first upload of the live site files.
- `2026` – Docker setup, recreated `.htaccess` rewrite rules (the original wasn't in the backup), and years 2022–2026 added.
- `2026` – Upgraded from PHP 5.6 to PHP 8.6.
