# LookingGlass
### v1.4.1

This project has been modified for Dino's Workshop. Have any suggestions? Submit an issue.

Our version is made to work on the Ubuntu operating system, though it should be fairly easy
to tweak for other linux flavors.

Download Latest Version: [v1.4.1](https://gitlab.d1n0.link/dino/LookingGlass/repository/archive.zip?ref=v1.4.1)

## Overview

LookingGlass is a user-friendly PHP based looking glass that allows the public (via a web interface)
to execute network commands on behalf of your server.

## Features

* Automated install via bash script
* IPv4 & IPv6 support
* Live output via long polling
* Bootstrap theme
* Rate limiting of network commands

## Implemented commands

* host
* mtr
* mtr6 (IPv6)
* ping
* ping6 (IPv6)
* traceroute
* traceroute6 (IPv6)
* nmap

Want to see something else? Open an issue > https://gitlab.d1n0.link/dino/LookingGlass/issues/new

__IPv6 commands will only work if your server has external IPv6 setup (or tunneled)__

## Requirements

* PHP >= 7.0
* PHP PDO with SQLite driver (required for rate-limit)
* SSH/Terminal access (able to install commands/functions if non-existent)

## Install

1. Download and extract on your webserver.
2. Run configure.sh ```bash configure.sh```
3. Enjoy! Please like the project on gitlab.

Better install instructions coming soon!

_Forgot a setting? Simply run the `configure.sh` script again_

## Updating

Install instructions will be updated for 1.4.0

1. Download and extract on your webserver. Overwriting your existing install.
2. Run configure.sh ```bash configure.sh```
3. Enjoy! Please like the project on gitlab.

Better upgrade instructions coming soon!

_Forgot a setting? Simply run the `configure.sh` script again_

## Apache

An .htaccess is included which protects the rate-limit database, disables indexes, and disables gzip on test files.
Ensure `AllowOverride` is on for .htaccess to take effect.

Output buffering __should__ work by default.

For an HTTPS setup, please visit:
- [Mozilla SSL Configuration Generator](https://mozilla.github.io/server-side-tls/ssl-config-generator/)

## Nginx

To enable output buffering, and disable gzip on test files please refer to the provided configuration:

[HTTP setup](LookingGlass/lookingglass-http.nginx.conf)

The provided config is setup for LookingGlass to be on a subdomain/domain root.

For an HTTPS setup please visit:
- [Best nginx configuration for security](http://tautt.com/best-nginx-configuration-for-security/)
- [Mozilla SSL Configuration Generator](https://mozilla.github.io/server-side-tls/ssl-config-generator/)

## License

Code is licensed under MIT Public License.

* If you wish to support my efforts, keep the "Powered by LookingGlass" link intact. or buy me a beer? lol
