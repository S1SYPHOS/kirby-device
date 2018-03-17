<?php

namespace Kirby\Plugins\Device;

use c;
use DeviceDetector\DeviceDetector;
use DeviceDetector\Parser\Device\DeviceParserAbstract;

class Detect
{

    protected $truncateVersion;

    public function __construct()
    {
         $this->truncateVersion = c::get('plugin.kirby-device.truncate-version', null);
    }

    protected function setVersionTruncation($version)
    {
        $string = strtoupper($version);
        $constant = DeviceParserAbstract::class . '::VERSION_TRUNCATION_' . $string;

        if (defined($constant)) {
            return DeviceParserAbstract::setVersionTruncation(constant($constant));
        } else {
            return false;
        }
    }

    public function detectDevice()
    {
        self::setVersionTruncation($this->truncateVersion);

        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        $detect = new DeviceDetector($userAgent);
        $detect->parse();

        return $detect;
    }
}
