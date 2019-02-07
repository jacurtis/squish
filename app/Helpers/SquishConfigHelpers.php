<?php

if (!function_exists('squishUrl')) {
  /**
   * description
   *
   * @param
   * @return
   */

  function squishUrl($path = '')
  {
    return str_finish(config('squish.domain'), '/').str_finish(config('squish.path'), '/').$path;
  }
}