<?php
namespace Tests;

use StatonLab\TripalTestSuite\DBTransaction;
use StatonLab\TripalTestSuite\TripalTestCase;

class LoaderTest extends TripalTestCase {
  use DBTransaction;

  public function testLoadFOneThousandStyleBibTex(){

    tripal_bibtex_import_bibtex('example/no_ws_example.bib');

    $query=  db_select('chado.pub', 'p')->fields('p', ['title', 'type_id'])->condition('title', 'NO WHITE SPACE');//title from the example file
    $result = $query->execute()->FetchAll();
    $this->assertNotEmpty($result);



  }

  //TODO: TEST TO ASSERT THE ENTITY IS PRESENT

  public function testLoaderFunctionalityWhiteSpace(){

  //  tripal_bibtex_import_bibtex('example/example.bib');

  $query=  db_select('chado.pub', 'p')->fields('p', ['title', 'type_id'])->condition('title', 'Tripal v0000: a test bibtex file');//title from the example file
  $result = $query->execute()->FetchAll();

//    $query=  db_select('chado.pub', 'p')->fields('p');//title from the example file
//    $result = $query->execute()->FetchAll();
//
  $this->assertNotEmpty($result);
  }

}
