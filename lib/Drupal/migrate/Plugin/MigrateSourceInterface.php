<?php

/**
 * @file
 * Contains \Drupal\migrate\Plugin\MigrateSourceInterface.
 */

namespace Drupal\migrate\Plugin;
use Drupal\migrate\Row;

/**
 * Defines an interface for migrate sources.
 */
interface MigrateSourceInterface extends \Countable {

  /**
   * Returns available fields on the source.
   *
   * @return array
   *   Available fields in the source, keys are the field machine names as used
   *   in field mappings, values are descriptions.
   */
  public function fields();


  /**
   * Returns the iterator that will yield the row arrays to be processed.
   *
   * @return \Iterator
   */
  public function getIterator();

  /**
   * Add additional data to the row.
   *
   * @param \Drupal\Migrate\Row $row
   *
   * @return bool
   *   FALSE if this row needs to be skipped.
   */
  public function prepareRow(Row $row);

  public function __toString();
}
