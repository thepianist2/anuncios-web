<?php

require_once '/var/www/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins(array('sfDoctrinePlugin','sfDoctrineGuardPlugin','sfFormExtraPlugin', 'sfMediaBrowserPlugin','sfImageTransformPlugin','sfWidgetFormInputSWFUploadPlugin','sfFilebasePlugin','sfCaptchaGDPlugin'));
  }
}
