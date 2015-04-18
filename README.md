activeMDM
=========

Open source MDM (Mobile Device Management) server for iOS and OSX (initially, Android _eventually_)

The initial goals of this project are to create a fully-functional MDM server for iOS and OSX with 3 major components

1. Administration-web tool to manage MDM payloads
1. Server job to poll a queue of devices that need to be told to refresh data and send messages via APNS to said devices
1. Web service to respond to devices which are either enrolling or responding to an APNS message

At this point (27th Feb 2014) the goals for v0.1 are:

1. iOS and OSX support
1. Device enrolment
1. APNS interaction
1. Device lock working

Currently, the goals for v0.1 do *not* include: 

1. Android support - we're not anti-Android, just taking baby-steps at this point
1. Windows Phone support (see above)
1. _insert name of platform here_ support (again, see above)
1. User, enterprise or user groups management - basically v0.1 will be a 'one shot' server: if you enrol onto the activeMDM instance, then you get _everything_ from the server

So we're aiming fairly low for v0.1. The list of functionality for v0.2 has not yet been written and we're not going to touch that until we're deep into v0.1: let's say the first two goals are complete and at least 50% of the third goal is done. 

Installation
============

We need: 

* Apache HTTPD server, probably v2.2 as that's the current latest and greatest
* PHP 5.4
* Slim framework
* Twig templates
* MongoDB 2.4

ActiveMDM uses the CFPropertyList project (https://github.com/rodneyrehm/CFPropertyList), however you will have to modify the call to saveXML call in the toXML function in CFPropertyList.php (line 418 ish) to 

$doc->saveXML($doc, LIBXML_NOEMPTYTAG)

Otherwise you'll end up with empty entities that aren't closed and that will cause the MDM payloads to fail on the device. We've forked CFPropertyList and made the change here: https://github.com/abstractec/CFPropertyList - if you install using composer (and you probably should), our forked version will be included in the project.

Within your mongoDB setup, you will need to add the following collections:

* config
* device
* queue
* status

using db.createCollection("config") and so on from the mongoDB console


