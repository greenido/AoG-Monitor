# Actions on Google Repo Monitor

This script will be used to monitor repositories you care about.
1. Fetch all the open issues.
2. TODO: Think on a way to present it and let developers work with it.
3. TOTO: Create a webhook and let 3p integrate with it (e.g. dashboards)

## Setup Instructions

### Pre-requisites
 1. You can clone this: https://github.com/KnpLabs/php-github-api
 2. Or you can get the version of `php-github-api` using [Composer](http://getcomposer.org).
The first step to use `php-github-api` is to download composer:

```bash
$ curl -s http://getcomposer.org/installer | php
```

Then run the following command to require the library:
```bash
$ php composer.phar require knplabs/github-api php-http/guzzle6-adapter
```

#### Be strong!


[![Analytics](https://ga-beacon.appspot.com/UA-65622529-1/AoG-Monitor/)](https://github.com/igrigorik/ga-beacon)
