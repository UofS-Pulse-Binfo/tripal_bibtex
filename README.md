# Tripal BibTeX

[![Build Status](https://travis-ci.org/UofS-Pulse-Binfo/tripal_bibtex.svg?branch=7.x-3.x)](https://travis-ci.org/UofS-Pulse-Binfo/tripal_bibtex)

A BibTEX importer for Tripal Publications. Currently this module only provides a drush function (`tripal-import-bibtex-pubs`; 
`trpimport-bibtex`) for import of BibTEX files.

### Known Limitations:
1. Apparently values can either be enclosed in {} or "", I only support {}.
2. When quotes (" ") are used, string concatenation can be done using #. This is not supported.
3. Assumes the = sign will be flanked by a space: title = {my amazing publication}

This importer has not been tested with enough bibtex files to ensure it fully supports the specification. Thus please 
test this module on a development site with your particular file before using it to import publications.
