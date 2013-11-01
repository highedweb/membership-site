membership.highedweb.org Tech Deets
===============

## General Notes
* `wp-config.php` is not versionable per WPEngine, so private stuff is kept in here and public stuff is kept in the peer file `wp-config-public.php` which is versionable
* `wp-content/plugins/civicrm/civicrm.settings.php` has been split to include a `-private` version, where the latter are not stored in git, as enforced by an entry in `.gitignore`

## Updating this git repo from 1and1 filesystem

Note: this shouldn't really need to be done once we "go git": folks should be committing to this repo before updating the filesystem on 1and1.  This is here to a) document the process, more or less, for confirming that this repo is up to date, and b) document how it was initially populated.

* perform a [Simple Backup](http://membership.highedweb.org/wp-admin/tools.php?page=backup_manager) and download the resultant .tar.gz, then delete the backup in the manager interface
* `$ mkdir -f /tmp/t ; rm -rf /tmp/t/*`
* untar the file to /tmp/t
* `$ git status`, making sure your workspace is clean
* `$ rsync -av --delete /tmp/t/homepages/41/d483464789/htdocs/membership/* .  ` (or somesuch; this is somewhat untested)
* `$ git status`
* looks good?  `$ git add . ; git commit -m "update from filesystem at 1and1"`

