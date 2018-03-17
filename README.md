# Kirby Device
[![Release](https://img.shields.io/github/release/S1SYPHOS/kirby-device.svg?color="brightgreen")](https://github.com/S1SYPHOS/kirby-device/releases) [![License](https://img.shields.io/github/license/S1SYPHOS/kirby-device.svg)](https://github.com/S1SYPHOS/kirby-device/blob/master/LICENSE) [![Issues](https://img.shields.io/github/issues/S1SYPHOS/kirby-device.svg)](https://github.com/S1SYPHOS/kirby-device/issues)

This plugin detects devices (such as desktop, tablet, mobile, tv, cars, console, ..), clients (browsers, feed readers, media players, PIMs, ..) as well as operating systems, brands and models.

**Table of contents**
- [1. Main features](#main-features)
- [2. Getting started](#getting-started)
- [3. Configuration](#configuration)
- [4. Available methods](#available-methods)
- [5. Examples](#examples)
- [6. Credits / License](#credits--license)

## Main features
`kirby-device` provides the `device()` function for parsing information from the target's user agent (UA) - the [black-magic voodoo science of regular expressions](https://blogs.perficient.com/perficientdigital/2017/12/04/the-magic-of-regex-an-intro-to-regular-expressions) then enables you to identify

- [operating systems](https://github.com/matomo-org/device-detector#list-of-detected-operating-systems))
- [browsers](https://github.com/matomo-org/device-detector#list-of-detected-browsers))
- [browser engines](https://github.com/matomo-org/device-detector#list-of-detected-browser-engines)
- [libraries](https://github.com/matomo-org/device-detector#list-of-detected-libraries) (eg cURL, Perl, Wget, ..)
- [media players](https://github.com/matomo-org/device-detector#list-of-detected-media-players)
- [personal information managers](https://github.com/matomo-org/device-detector#list-of-detected-pims-personal-information-manager) (PIMs)
- [feed readers](https://github.com/matomo-org/device-detector#list-of-detected-feed-readers)
- [brands & devices](https://github.com/matomo-org/device-detector#list-of-brands-with-detected-devices)
- .. and of course: [bots](https://github.com/matomo-org/device-detector#list-of-detected-bots)

## Getting started
Use one of the following methods to install & use `kirby-device`:

### Git submodule
If you know your way around Git, you can download this plugin as a [submodule](https://github.com/blog/2104-working-with-submodules):

```text
git submodule add https://github.com/S1SYPHOS/kirby-device.git site/plugins/kirby-device
```

### Clone or download
1. [Clone](https://github.com/S1SYPHOS/kirby-device.git) or [download](https://github.com/S1SYPHOS/kirby-device/archive/master.zip)  this repository.
2. Unzip / Move the folder to `site/plugins`.

### Activate the plugin
Activate the plugin with the following line in your `config.php`:

```text
c::set('plugin.kirby-device', true);
```

## Configuration
Change `kirby-device` options to suit your needs:

| Option | Type | Default | Description |
| --- | --- | --- | --- |
| `plugin.kirby-device.truncate-version` | String | `minor` | Defines the browser build or version format according to the [semantic versioning](https://semver.org/) specification (allowed values are `major`, `minor`, `patch` as well as `build` & `none`). |
| `plugin.kirby-device.enable-filecache` | Boolean | `true` | Optionally enables / disables filecache. |

## Available methods
These methods are available to meet your device detection requirements:

```php
// Configuration Methods
setCache()
setYamlParser()
discardBotInformation()
skipBotDetection()

// General Device Type Methods
isBot()
isMobile()
isDesktop()
isTouchEnabled() // win8 tablets only

// General Client Type Methods
getBot() // array
getClient() // array | optionally string, eg getClient('version'))
getOs() // array | optionally string, eg getOs('version')
getDevice()
getDeviceName()
getBrand()
getBrandName()
getModel()
getUserAgent()

// Specific Device Type Methods
isSmartphone()
isFeaturePhone()
isTablet()
isPhablet()
isConsole()
isPortableMediaPlayer()
isCarBrowser()
isTV()
isSmartDisplay()
isCamera()

// Specific Client Type Methods
isBrowser()
isFeedReader()
isMobileApp()
isPIM()
isLibrary()
isMediaPlayer()
```

Unless stated, all `isSomething()` methods return booleans, all `getSomething()` methods return strings.

## Examples

### Check for mobile environment

```php
if (device()->isMobile()) {
  // Your code here.
}
```

### Check for tablet device

```php
if (device()->isTablet()) {
  // Your code here.
}
```

### Only show code on desktop or tablet device

```php
if(device()->isDesktop() || device()->isTablet()) {
    // Your desktop & tablet code here.
}
```

### .. and much more!

```php
// Get user agent (UA)
$ua = device()->getUserAgent();

// Get operating system
$os = device()->getOs();

// Get mobile device information
$brand = device()->getBrandName(); // eg 'Apple'
$model = device()->getModel(); // eg 'iPhone'
```

Feel free to write your own methods:

```php
// Custom function detecting Chrome browser
function isChrome() {
  return device()->getClient('name') == 'Chrome' ? true : false;
}
```

For more information, see the [project's repo](https://github.com/serbanghita/Mobile-Detect) or check out its [demo page](http://devicedetector.net/index.php).

## Credits / License
`kirby-device` is based on Matomo's [DeviceDetector](https://github.com/matomo-org/device-detector) and was inspired by [Sonja Broda](https://github.com/texnixe)'s Kirby plugin [kirby-mobile-detect](https://github.com/texnixe/kirby-mobile-detect) (an implementation of Şerban Ghiţă's [Mobile-Detect](https://github.com/serbanghita/Mobile-Detect)). It is licensed under the [MIT License](LICENSE), but **using Kirby in production** requires you to [buy a license](https://getkirby.com/buy). Are you ready for the [next step](https://getkirby.com/next)?

## Special Thanks
I'd like to thank everybody that's making great software - you people are awesome. Also I'm always thankful for feedback and bug reports :)
