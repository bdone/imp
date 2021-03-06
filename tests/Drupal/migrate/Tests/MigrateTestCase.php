<?php

/**
 * @file
 * Contains \Drupal\migrate\Tests\MigrateTestCase.
 */

namespace Drupal\migrate\Tests;

use Drupal\Tests\UnitTestCase;

abstract class MigrateTestCase extends UnitTestCase {

  /**
   * @TODO: does this need to be derived from the source/destination plugin?
   *
   * @var bool
   */
  protected $mapJoinable = TRUE;

  protected $migrationConfiguration = array();

  protected function getMigration() {
    $idmap = $this->getMock('Drupal\migrate\Plugin\MigrateIdMapInterface');
    if ($this->mapJoinable) {
      $idmap->expects($this->once())
        ->method('getQualifiedMapTable')
        ->will($this->returnValue('test_map'));
    }

    $migration = $this->getMock('Drupal\migrate\Entity\MigrationInterface');
    $migration->expects($this->any())
      ->method('getIdMap')
      ->will($this->returnValue($idmap));
    $configuration = $this->migrationConfiguration;
    $migration->expects($this->any())
      ->method('get')
      ->will($this->returnCallback(function ($argument) use ($configuration) { return isset($configuration[$argument]) ? $configuration[$argument] : ''; }));
    $migration->expects($this->any())
      ->method('id')
      ->will($this->returnValue($configuration['id']));
    return $migration;
  }

  /**
   * Provide meta information about this battery of tests.
   */
  public static function getInfo() {
    return array(
      'name' => 'Migrate test',
      'description' => 'Tests for migrate plugin.',
      'group' => 'Migrate',
    );
  }

}
