membership.highedweb.org Tech Deets
===============

## General Notes
* `wp-config.php` and `wp-content/plugins/civicrm/civicrm.settings.php` have been split to include `-private` versions, where the latter are not stored in git, as enforced by an entry in `.gitignore`

## Updating this git repo from 1and1 filesystem

Note: this shouldn't really need to be done except to capture uploads and such: folks should be committing to this repo before updating the filesystem on 1and1.  This is here to a) document the process, more or less, for confirming that this repo is up to date, and b) document how it was initially populated.

* perform a [Simple Backup](http://s483464761.onlinehome.us/wp-admin/tools.php?page=backup_manager) and download the resultant .tar.gz into the root of this repo, calling it `filesystem.tgz`, then delete the backup in the manager interface
* `$ mkdir -f /tmp/t ; rm -rf /tmp/t/*`
* `$ git status`, making sure your workspace is clean
* `$ rsync -av --delete /tmp/t/homepages/41/d483464789/htdocs/membership/* .  ` (or somesuch)
* `$ git status`
* looks good?  `$ git add . ; git commit -m "update from filesystem at 1and1"`

