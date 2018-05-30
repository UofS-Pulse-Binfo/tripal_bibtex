<?php
namespace Tests;

use StatonLab\TripalTestSuite\DBTransaction;
use StatonLab\TripalTestSuite\TripalTestCase;

class LoaderTest extends TripalTestCase {
  use DBTransaction;

  public function testLoadFOneThousandStyleBibTex(){

    $query=  db_select('chado.pub', 'p')->fields('p', ['title', 'type_id'])->condition('title', 'NO WHITE SPACE');//title from the example file
    $result = $query->execute()->FetchAll();

    if ($result){
      print("Warning: the test file has already been loaded.\n");
    }
    tripal_bibtex_import_bibtex(__DIR__ . '/../example/no_ws_example.bib');

    $query=  db_select('chado.pub', 'p')->fields('p', ['title', 'type_id'])->condition('title', 'NO WHITE SPACE');//title from the example file
    $result = $query->execute()->FetchAll();
    $this->assertNotEmpty($result);



  }

  //TODO: TEST TO ASSERT THE ENTITY IS PRESENT

  /**
   * This test is is for functionality not yet implemented.
   * When passing this module will also support loading bibtex output from paperpile, with some whitespace formatting before the key in the key = {value} pair.
   *
   */
//  public function testLoaderFunctionalityWhiteSpace(){
//
//  //  tripal_bibtex_import_bibtex('example/example.bib');
//
//  $query=  db_select('chado.pub', 'p')->fields('p', ['title', 'type_id'])->condition('title', 'Tripal v0000: a test bibtex file');//title from the example file
//  $result = $query->execute()->FetchAll();
//
////    $query=  db_select('chado.pub', 'p')->fields('p');//title from the example file
////    $result = $query->execute()->FetchAll();
////
//  $this->assertNotEmpty($result);
//  }

}
