<?php

namespace Tests;

use StatonLab\TripalTestSuite\DBTransaction;
use StatonLab\TripalTestSuite\TripalTestCase;

require_once(__DIR__ . '/../includes/TripalImporter/BibtexImporter.inc');

class BibtexImporterTest extends TripalTestCase {

  // Uncomment to auto start and rollback db transactions per test method.
  // use DBTransaction;

  use DBTransaction;

  public function testImporterFunctionality() {

    $query = db_select('chado.pub', 'p')
      ->fields('p', ['title', 'type_id'])
      ->condition('title', 'NO WHITE SPACE');//title from the example file
    $result = $query->execute()->FetchAll();

    if ($result) {
      print("\nWarning: the test file has already been loaded.\n");
    }

    //Create a fake Importer job by packagin up an arguments array for the importer class.
    $file = ['file_local' => __DIR__ . '/../example/no_ws_example.bib'];
    $run_args = [];
    $importer = new \BibtexImporter();
    $importer->create($run_args, $file);
    $importer->run();

    $query = db_select('chado.pub', 'p')
      ->fields('p', ['title', 'type_id'])
      ->condition('title', 'NO WHITE SPACE');//title from the example file
    $result = $query->execute()->FetchAll();
    $this->assertNotEmpty($result);

  }
}


