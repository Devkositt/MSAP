# MASP on Vercel

## Important limitations

Vercel Functions have a read-only filesystem. Only `/tmp` is writable and it
is not persistent. This project redirects Laravel cache, views, logs and cookie
sessions to serverless-safe locations. Do not use SQLite on Vercel.

The catalog and admin pages can run on Vercel, but uploaded pet photos,
donation slips and expense receipts require persistent S3-compatible object
storage. The current local upload disk is suitable only for testing; uploaded
files may disappear between Vercel requests until an object-storage disk is
configured.

The `vercel-php` runtime is community maintained, not a first-party Vercel PHP
runtime.

## Required Vercel environment variables

Set these for Production, Preview and Development as appropriate:

```env
APP_NAME=MASP
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-project.vercel.app
APP_KEY=base64:GENERATE_A_REAL_KEY

LOG_CHANNEL=stderr
CACHE_STORE=array
SESSION_DRIVER=cookie
SESSION_SECURE_COOKIE=true
QUEUE_CONNECTION=sync

DB_CONNECTION=mysql
DB_HOST=your-public-mysql-host
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password

ADMIN_EMAIL=your-admin@example.com
ADMIN_PASSWORD=use-a-long-random-password
```

Generate `APP_KEY` locally:

```bash
php artisan key:generate --show
```

The database must accept connections from Vercel. A MySQL server bound to
localhost or a private cPanel-only hostname cannot be reached by Vercel.

## Initialize the database

Run this from a trusted local machine with `.env` temporarily pointing at the
production database:

```bash
php artisan migrate --force
php artisan db:seed --force
```

Do not run migrations automatically on every serverless deployment.

## Deploy

The recommended upload method is a Git repository:

1. Push the project to GitHub/GitLab/Bitbucket. Never commit `.env`.
2. In Vercel, choose **Add New → Project** and import the repository.
3. Leave Framework Preset as **Other** and Root Directory as the repository root.
4. Add all environment variables above.
5. Deploy.

For CLI deployment:

```bash
npm install -g vercel
vercel login
vercel
vercel --prod
```

Composer dependencies are installed by the PHP runtime during the build;
`.vercelignore` intentionally excludes the local `vendor` directory.
