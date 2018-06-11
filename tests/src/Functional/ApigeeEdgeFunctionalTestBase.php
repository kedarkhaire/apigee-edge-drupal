<?php

/**
 * Copyright 2018 Google Inc.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License version 2 as published by the
 * Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY
 * or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public
 * License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc., 51
 * Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 */

namespace Drupal\Tests\apigee_edge\Functional;

use Behat\Mink\Driver\GoutteDriver;
use Drupal\Tests\BrowserTestBase;

/**
 * Base class for functional tests.
 */
abstract class ApigeeEdgeFunctionalTestBase extends BrowserTestBase {

  use ApigeeEdgeTestTrait;

  /**
   * {@inheritdoc}
   */
  public function __construct($name = NULL, array $data = [], $dataName = '') {
    parent::__construct($name, $data, $dataName);
    // GoutteDriver must be used for functional tests because response headers
    // are not available from DrupalSelenium2Driver.
    $this->minkDefaultDriverClass = GoutteDriver::class;
  }

}
