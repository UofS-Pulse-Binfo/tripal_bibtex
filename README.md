# Tripal BibTeX

[![Build Status](https://travis-ci.org/UofS-Pulse-Binfo/tripal_bibtex.svg?branch=7.x-3.x)](https://travis-ci.org/UofS-Pulse-Binfo/tripal_bibtex)

A BibTEX importer for Tripal Publications. This module provides 
 - a drush function, `trpimport-bibtex`, for command-line loading
 - a Tripal Importer for loading through the user interface

**This importer has not been tested with enough bibtex files to ensure it fully supports the specification. Thus please 
test this module on a development site with your particular file before using it to import publications.**

## Quick Start

1. Install this module as you would any Drupal module (ie: download, unpack in sites/all/modules and enable through http://[your site]/admin/modules)
2. Import your BibTeX file using the drush command: `drush trpimport-bibtex /full/path/to/your/file.tex` OR through the user interface at Admin > Tripal > Data Loaders > Chado BibTeX Loader
