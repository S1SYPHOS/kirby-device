<?php

namespace Kirby\Plugins\Device;

use DeviceDetector\DeviceDetector;
use DeviceDetector\Parser\Device\DeviceParserAbstract;

class Detect {
  public function detectDevice() {
    DeviceParserAbstract::setVersionTruncation(DeviceParserAbstract::VERSION_TRUNCATION_NONE);
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $detect = new DeviceDetector($userAgent);
    $detect->parse();
    
    return $detect;
  }
}
