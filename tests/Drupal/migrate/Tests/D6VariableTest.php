<?php

/**
 * @file
 * Contains \Drupal\migrate\Tests\D6VariableSourceTest.
 */

namespace Drupal\migrate\Tests;

/**
 * @group migrate
 */
class D6VariableTest extends MigrateSqlSourceTestCase {

  const PLUGIN_CLASS = 'Drupal\migrate\Plugin\migrate\source\D6Variable';

  protected $migrationConfiguration = array(
    'id' => 'test',
    'highwaterProperty' => array('field' => 'test'),
    'idlist' => array(),
    'source' => array(
      'plugin' => 'drupal6_variable',
      'variables' => array(
        'foo',
        'bar',
      ),
    ),
    'sourceIds' => array(
    ),
    'destinationIds' => array(
    ),
  );

  protected $mapJoinable = FALSE;

  protected $results = array(
    array(
      'foo' => 1,
      'bar' => FALSE,
    ),
  );

  protected $databaseContents = array('variable' => array(
    array('name' => 'foo', 'value' => 'i:1;'),
    array('name' => 'bar', 'value' => 'b:0;'),
  ));

  public static function getInfo() {
    return array(
      'name' => 'D6 variabe source functionality',
      'description' => 'Tests D6 variable source plugin.',
      'group' => 'Migrate',
    );
  }

}
