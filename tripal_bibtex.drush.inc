<?php

/**
 * @file
 * Provide drush support for this module.
 */
 
/**
 * Implementation of hook_drush_command().
 */
function tripal_bibtex_drush_command() {
  $items = array();
  

  $items['tripal-import-bibtex-pubs'] = array(
    'description' => 'Imports Tripal publications from a Bibtex file.',
    'aliases' => array('trpimport-bibtex'),
    'arguments' => array(
      'filename' => 'The filename (including full path) for the file containing publications you would like to import. The file must be in Bibtex format.',
    ),
    'options' => array()
  );
  
  return $items;
}

/**
 * Drush Implementation: tripal-import-bibtex-pubs command.
 */
function drush_tripal_bibtex_tripal_import_bibtex_pubs($filename) {
  tripal_bibtex_import_bibtex($filename);  
}