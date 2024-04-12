<?php

namespace Drupal\apigee_edge\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;

/**
 * Checks that the submitted value is a unique integer.
 *
 * @Constraint(
 *   id = "LowercaseEmail",
 *   label = @Translation("Lowercase Email", context = "Validation"),
 *   type = "email"
 * )
 */
class LowercaseEmailConstraint extends Constraint {

  /**
   * The message that will be shown if the value contains any uppercase characters.
   *
   * @var string
   */
  public $notLowercase = 'This email address - %value has uppercase characters, it accepts only lowercase characters.';

}
