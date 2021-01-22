# Cron PHP Parameters

[![Latest Stable Version](https://img.shields.io/packagist/v/blackbird/cronparameters.svg?style=flat-square)](https://packagist.org/packages/blackbird/cronparameters)
[![License: MIT](https://img.shields.io/github/license/blackbird-agency/magento-2-cron-php-parameters.svg?style=flat-square)](./LICENSE)

This module allows you to add PHP parameters on Magento 2 cronjob installation.
The free source is available at the [GitHub repository](https://github.com/blackbird-agency/magento-2-cron-php-parameters).

## Setup

### Get the package

**Zip Package:**

Unzip the package in app/code/Blackbird/CronParameters, from the root of your Magento instance.

**Composer Package:**

```
composer require blackbird/cronparameters
```

### Install the module

Go to your Magento root, then run the following Magento command:

```
php bin/magento setup:upgrade
```

**If you are in production mode, do not forget to recompile and redeploy the static resources, or to use the `--keep-generated` option.**

### Administrators

When running magento 2 command `php bin/magento cron:install"` you can add `-p="my php parameters"` or `--params="my php parameters"`.

- Running with `--params`
```
php bin/magento cron:install --params="-d max_execution_time=xxx"
```

- or with `-p`
```
php bin/magento cron:install -p="-d max_execution_time=xxx"
```
- **Results in something like:** (by running `crontab -l`)
```
* * * * * /usr/bin/php -d max_execution_time=xxx {magentoRoot}/bin/magento cron:run | grep -v "Ran jobs by schedule" >> {magentoLog}/magento.cron.log
```

## Support

- If you have any issue with this code, feel free to [open an issue](https://github.com/blackbird-agency/magento-2-cron-php-parameters/issues/new).
- If you want to contribute to this project, feel free to [create a pull request](https://github.com/blackbird-agency/magento-2-cron-php-parameters/compare).

## Contact

For further information, contact us:

- by email: hello@bird.eu
- or by form: [https://black.bird.eu/en/contacts/](https://black.bird.eu/contacts/)

## Authors

- **Bruno Fache** - *Maintainer* - [It's me!](https://github.com/bruno-blackbird)
- **Blackbird Team** - *Contributor* - [They're awesome!](https://github.com/blackbird-agency)

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

***That's all folks!***
