<?php

namespace Drupal\apigee_edge\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Validates the LowercaseEmail constraint.
 */
class LowercaseEmailConstraintValidator extends ConstraintValidator {

  /**
   * {@inheritdoc}
   */
  public function validate($value, Constraint $constraint) {
    foreach ($value as $item) {
      // First check if the organization is ApigeeX.
      try {
        /** @var \Drupal\apigee_edge\SDKConnectorInterface $sdk_connector */
        $sdk_connector = \Drupal::service('apigee_edge.sdk_connector');
        $org_controller = \Drupal::service('apigee_edge.controller.organization');
        /* @var \Apigee\Edge\Api\Management\Entity\Organization $organization */
        $organization = $org_controller->load($sdk_connector->getOrganization());

        // Check if organization is ApigeeX.
        if ($organization && ('CLOUD' === $organization->getRuntimeType() || 'HYBRID' === $organization->getRuntimeType())) {
          if (preg_match('/[A-Z]/', $item->value)) {
            // The value contains uppercase character, the error, is applied.
            $this->context->addViolation($constraint->notLowercase, ['%value' => $item->value]);
          }
        }
      }
      catch (\Exception $exception) {
        // If not able to connect to Apigee Edge.
        Drupal::logger('apigee_edge')->error($exception->getMessage());
      }
    }
  }

}