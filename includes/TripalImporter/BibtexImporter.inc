<?php

class BibtexImporter extends TripalImporter {

  /**
   * The name of this loader.  This name will be presented to the site
   * user.
   */
  public static $name = 'Chado bibtex Loader';

  /**
   * The machine name for this loader. This name will be used to construct
   * the URL for the loader.
   */
  public static $machine_name = 'chado_bibtex_loader';

  /**
   * A brief description for this loader.  This description will be
   * presented to the site user.
   */
  public static $description = 'Load bibtex formatted publications into Chado';

  /**
   * An array containing the extensions of allowed file types.
   */
  public static $file_types = [
    '.txt',
    '.tex',
    'bib',
  ];

  /**
   * Allow, but dont require, an analysis.
   */
  public static $use_analysis = TRUE;

  public static $require_analysis = FALSE;

  /**
   * Provides information to the user about the file upload.  Typically this
   * may include a description of the file types allowed.
   */
  public static $upload_description = 'Please provide the bibtex file. The file must have a .txt, .tex, or .bib extension.';

  /**
   * The title that should appear above the file upload section.
   */
  public static $upload_title = 'Bibtex File Upload';

  /**
   * Text that should appear on the button at the bottom of the importer
   * form.
   */
  public static $button_text = 'Import bibtex file';


  /**
   * Indicates the methods that the file uploader will support.
   */
  public static $methods = [
    // Allow the user to upload a file to the server.
    'file_upload' => TRUE,
    // Allow the user to provide the path on the Tripal server for the file.
    'file_local' => TRUE,
    // Allow the user to provide a remote URL for the file.
    'file_remote' => TRUE,
  ];

  /**
   * @see TripalImporter::form()
   */
  public function form($form, &$form_state) {


    $form['instructions'] = [
      '#markup' => '
<h2>A BibTEX importer for Tripal Publications. </h2>
<p>
There are several known limitations for this importer.  Please see <a href ="https://github.com/UofS-Pulse-Binfo/tripal_bibtex">the github repo for this project</a> for a complete list.  
</p>
<p>
This importer has not been tested with enough bibtex files to ensure it fully supports the specification. Thus please 
test this module on a development site with your particular file before using it to import publications.</p>
',
    ];


    return $form;
  }

  /**
   * @see TripalImporter::formValidate()
   */
  public function formValidate($form, &$form_state) {

  }

  /**
   * @see TripalImporter::run()
   */
  public function run() {

    $arguments = $this->arguments['run_args'];
    $file_path = $this->arguments['files'][0]['file_path'];

    tripal_bibtex_import_bibtex($file_path);
  }
}
