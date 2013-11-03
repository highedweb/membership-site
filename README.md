membership.highedweb.org Tech Deets
===============

# Updating WPEngine from 1and1

A proper update consists of copying the following three categories of data, and doing host and pathname translation on them.  Database translation is encoded programmatically in the tooling.  Filesystem translation is contained in git and should be maintained manually throughout updates as described in `Updating the WPEngine branch from master`.  Unversioned files do not contain hard coded host and pathnames, at least as as been discovered so far.

* Versioned files
* Unversioned files
* Database

## Updating versioned files from 1and1 to WPEngine

* follow the "Updating master from 1and1" in the master branch's README, then follow "Updating the WPEngine branch from master" in this README
* `git checkout wpengine`
* `git remote add wpengine-prod git@git.wpengine.com:production/woodwardjd.git` if not already done locally
* `git push wpengine-prod`

## Updating non-versioned files from 1and1 to WPEngine

The following trees are not stored in git (per WPEngine, and perhaps common sense), and must be manually copied to WPEngine.  Here's a fast-ish way to mirror stuff from the 1and1 fs to WPEngine's fs

* TODO: enumerate trees that must be copied (see civicrm upgrade and migration docs, as well as paths in civicrm.settings and in the database)
* TODO: enumerate the make-zip, unpack-zip-locally, use-lftp-mirror-functionality steps

## Updating database from 1and1 to WPEngine

* Download the latest database dump from the `Simple Backup` WP plugin on 1and1, store it as `database.sql` in the root of a working copy checkout of this repo and branch
* `rake splitdbdump` will split the database dump into bite size chunks `database-##.sql` for uploading into WPEngine, and do path and hostname translation between the two installations. 
* use WPEngine's phpMyAdmin to drop every table in the database
* Import `database-##.sql` order from 1..n through WPEngine's phpMyAdmin

# Miscellaneous Notes

## Private Configuration File Notes
* `wp-config.php` is not versionable per WPEngine, so private stuff is kept in here and public stuff is kept in the peer file `wp-config-public.php` which is versionable
* `wp-content/plugins/civicrm/civicrm.settings.php` has been split to include a `-private` version, where the latter are not stored in git, as enforced by an entry in `.gitignore`
* the Rakefile has seed versions of these files, and can create them with `rake seed_private_config_files`
* copy these files to production with the command output by `rake sftp_private_config_files`

## Updating the WPEngine branch from master

With luck, it's as simple as the following, and updates made on this branch (like 5.3.3 => 5.3.2 and path and host changes in the public config files) will stick.  Be sure to manually check the merge to see that it's not doing anything stupid (for various values of "stupid").

* `git merge master`

