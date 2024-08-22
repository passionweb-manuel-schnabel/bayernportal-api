# Use BayernPortal API

Shows the integration of the BayernPortal API. (TYPO3 CMS)

## What does it do?

Adds a plugin that shows usage of the BayernPortal API based on the "leistungsbeschreibungen" endpoint .

## Installation

Add via composer:

    composer require "passionweb/bayernportal-api"

* Install the extension via composer
* Enter your BayernPortal API credentials in the extension settings
* Flush TYPO3 and PHP Cache

## Requirements

This example uses the BayernPortal API and you need your "Benutzerkennung" which can be accessed here [https://www.bayvis-redaktionssystem.bayern.de/login.xhtml](mailto:service@passionweb.de "Login BayernPortal") .

## Extension settings

There are the following extension settings available.

### `municipalCode`

    # cat=BayernPortal API; type=string; label="Gemeindekennziffer" of city/commune
    municipalCode =

### `apiUrl`

    # cat=BayernPortal API; type=string; label= API address of BayernPortal API (with trailing slash)
    apiUrl = https://www.bayernportal-webservices.bayern.de/rest/allgemein/

### `apiVersion`

    # cat=BayernPortal API; type=string; label=API version of BayernPortal API
    apiVersion = v3

### `apiUserIdentification`

    # cat=BayernPortal API; type=string; label=User identification of BayernPortal API
    apiUserIdentification =

### `apiPassword`

    # cat=BayernPortal API; type=string; label=Password of BayernPortal API
    apiPassword =

## Troubleshooting and logging

If something does not work as expected take a look at the log file.
Every problem is logged to the TYPO3 log (normally found in `var/log/typo3_*.log`)

## Achieving more together or Feedback, Feedback, Feedback

I'm grateful for any feedback! Be it suggestions for improvement, requests or just a (constructive) feedback on how good or crappy this snippet/repo is.

Feel free to send me your feedback to [service@passionweb.de](mailto:service@passionweb.de "Send Feedback") or [contact me on Slack](https://typo3.slack.com/team/U02FG49J4TG "Contact me on Slack")
