# Tripal BibTeX

[![Build Status](https://travis-ci.org/UofS-Pulse-Binfo/tripal_bibtex.svg?branch=7.x-3.x)](https://travis-ci.org/UofS-Pulse-Binfo/tripal_bibtex)

A BibTEX importer for Tripal Publications. Currently this module only provides a drush function (`tripal-import-bibtex-pubs`; 
`trpimport-bibtex`) for import of BibTEX files.

### Known Limitations:
1. Apparently values can either be enclosed in {} or "", I only support {}. If you want support for quotes, please comment on [Issue #9](https://github.com/UofS-Pulse-Binfo/tripal_bibtex/issues/9).
2. When quotes (" ") are used, string concatenation can be done using #. This is not supported.
3. Assumes the = sign will be flanked by a space: title = {my amazing publication}. Furthermore, it assumes there is no whitespace preceeding the tag. For progress on making the loader more white-space tolerant, see [Issue #5](https://github.com/UofS-Pulse-Binfo/tripal_bibtex/issues/5)

This importer has not been tested with enough bibtex files to ensure it fully supports the specification. Thus please 
test this module on a development site with your particular file before using it to import publications.
