membership.highedweb.org Tech Deets
===============

# Changes, updates and configurations maintained inside CiviCRM and its source tree

Herein is documented stuff that may get blown away across upgrades and server moves.  Be wary!

* `techadmin_cron` as `HEWEB_TECHADMIN_USER` configured in `wp-content/plugins/civicrm/civicrm.settings-private.php` and set up as anonymous user in WordPress
* `wp-content/plugins/civicrm/civicrm/bin/heweb_techadmin_no_really_run_cron_jobs.php` which is executed by [Easy Cron](http://easycron.com)
* 5.3.3 as a minimum PHP version is changed to 5.3.2 in several places, notably:
    * `wp-content/plugins/civicrm/civicrm.php`
    * `wp-content/plugins/civicrm/civicrm/CRM/Upgrade/Form.php`
    * `wp-content/plugins/civicrm/civicrm/install/index.php`

## Other CiviCRM upgrade tasks

These are documented in CiviCRM's docs, but sometimes are scattered and nonobvious (to me), so I'm recording them here, too.

* Execute [http://membership.highedweb.org/wp-admin/admin.php?page=CiviCRM&q=civicrm/upgrade&reset=1](http://membership.highedweb.org/wp-admin/admin.php?page=CiviCRM&q=civicrm/upgrade&reset=1)
* Do [these urls](http://membership.highedweb.org/wp-admin/admin.php?page=CiviCRM&q=civicrm/admin/setting/url&reset=1) make sense?
* Do [these paths](http://membership.highedweb.org/wp-admin/admin.php?page=CiviCRM&q=civicrm/admin/setting/path&reset=1) make sense?
* Execute [cleanup caches](http://membership.highedweb.org/wp-admin/admin.php?page=CiviCRM&q=civicrm/admin/setting/updateConfigBackend&reset=1)

# Pushing to WPEngine

Get Jason or Curtiss or Chad to add you and your SSH key be added to `hewmembership`.

## Staging

Use this for tests.  See WPEngine docs for how to update staging to latest from production.

* `git remote add wpengine-staging git@git.wpengine.com:staging/hewmembership.git` if not already done locally
* `git push wpengine-staging <working_branch_name>:master`


## Production

* `git remote add wpengine-prod git@git.wpengine.com:production/hewmembership.git` if not already done locally
* `git push wpengine-prod master`

# Nonversioned trees

The following trees are not stored in git (per WPEngine, and perhaps common sense).  This may be incomplete.

* wp-content/uploads/...
* wp-content/plugins/files/civicrm/upload/...
* wp-content/HighEdWeb website pre 2009.zip

The following trees *are* currently stored in git, but *may* at some point be rejected by WPEngine rules.

* wp-content/plugins/files/civicrm/persist/contribute/...
* wp-content/plugins/files/civicrm/custom/...

# Private Configuration File Notes
* `wp-config.php` is not versionable per WPEngine, so private stuff is kept in here and public stuff is kept in the peer file `wp-config-public.php` which is versionable
* `wp-content/plugins/civicrm/civicrm.settings.php` has been split to include a `-private` version, where the latter are not stored in git, as enforced by an entry in `.gitignore`

# Updating WPEngine from 1and1 (OLD)

* Migration from 1and1 is complete, and `master` now represents WPEngine current production state.  See older revisions of this file for details of how migration was performed.
