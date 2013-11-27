membership.highedweb.org Tech Deets
===============

## General Notes
* `wp-config.php` is not versionable per WPEngine, so private stuff is kept in here and public stuff is kept in the peer file `wp-config-public.php` which is versionable
* `wp-content/plugins/civicrm/civicrm.settings.php` has been split to include a `-private` version, where the latter are not stored in git, as enforced by an entry in `.gitignore`

## Updating this git repo from 1and1 filesystem

Note: this shouldn't really need to be done once we "go git": folks should be committing to this repo before updating the filesystem on 1and1.  This is here to a) document the process, more or less, for confirming that this repo is up to date, and b) document how it was initially populated, and c) to handle committing to the 1and1 git stuff that got added to the filesystem on the server side (uploads, etc)

* perform a [Simple Backup](http://membership.highedweb.org/wp-admin/tools.php?page=backup_manager) and download the resultant .tar.gz, then delete the backup in the manager interface
* `$ mkdir /tmp/t ; rm -rf /tmp/t/*`
* untar the file to /tmp/t
* `$ mv /tmp/t/homepages/41/d483464789/htdocs/membership /tmp/t/membership`
* `$ diff -bBr membership-site /tmp/t/membership` and inspect the differences.  Does this look sane?
* `$ git status`, making sure your workspace is clean
* make the trees the same, more or less (ignore crap like .DS_store and such). updates usually are only to wp-content/..., but won't be if WP is upgraded on 1and1 for instance.  Try one of following to make them the same:
    * _WARNING:_ these commands also copy wp-content/plugins/files/civicrm/upload/... which tends to contain stuff we don't want versioned.  This should be protected by the .gitignore, but watch out.
    * `$ rm -rf membership-site/wp-content ; cp -a /tmp/t/membership/wp-content membership-site`
    * `$ cd membership-site ; rsync -av --delete /tmp/t/membership/* .  ` (or somesuch; this is somewhat untested)
* `$ git status` and `$ git diff`
* looks good?  `$ git add -A . ; git commit -m "update from filesystem at 1and1"`

