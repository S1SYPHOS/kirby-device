<?php

/**
 * Kirby Device - Comprehensive user agent & device detection for Kirby
 *
 * @package   Kirby CMS
 * @author    S1SYPHOS <hello@twobrain.io>
 * @link      http://twobrain.io
 * @version   0.1.0
 * @license   MIT
 */

if (c::get('plugin.kirby-device', false)) {
    // Initialising composer's autoloader
    require_once __DIR__ . DS . 'vendor/autoload.php';

    // Loading settings & core
    require_once __DIR__ . DS . 'core' . DS . 'device_detection.php';

    function device()
    {
        return (new Kirby\Plugins\Device\Detect)->detectDevice();
    }
}
