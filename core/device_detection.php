<?php

namespace Kirby\Plugins\Device;

use c;
use DeviceDetector\DeviceDetector;
use DeviceDetector\Parser\Device\DeviceParserAbstract;
use Doctrine\Common\Cache;

class Detect
{

    protected $truncateVersion;
    protected $enableFilecache;
    protected $filecacheDirectory;

    public function __construct()
    {
        $this->truncateVersion = c::get('plugin.kirby-device.truncate-version');
        $this->enableFilecache = c::get('plugin.kirby-device.enable-filecache', true);
        $this->filecacheDirectory = kirby()->roots()->cache();
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

        if ($this->enableFilecache) {
            $detect->setCache(new \Doctrine\Common\Cache\PhpFileCache($this->filecacheDirectory));
        }

        $detect->parse();
        return $detect;
    }
}
