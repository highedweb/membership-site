membership.highedweb.org Tech Deets
===============

*WARNING: a lot of this is out-of-date as of review on 2019/02/25.  See notes below for more details*

This repo is the code behind membership.highedweb.org when it ran on WPEngine, prior to the migration to CiviDesk several years prior to February 2019.  Unsure of the actual date of the migration.  We may start re-using this repo when we move to Pantheon hosting and Tadpole support in early 2019, at which time this README should be updated.

# CiviCRM, WordPress and 2014 Annual Registration Roles

The Association has authorized several membership levels: Professional, Student, Honorary and Affiliate (*note: membership levels changed in 2017 or 2018, this is probably out of date.  Contact membership committee for an updated list*).  One's current membership status is governed by the rules set forth by the Board.  The CiviCRM database and software is configured to store each individual's status based on the presence of various records.  The exact nature of this configuration is outside the scope of this document to enumerate.

Periodically WordPress users and roles are synchronized with CiviCRM's understanding of the world such that there are at least one WordPress user for each current Association member, and that their WordPress role is set to one of ProfessionalMember, StudentMember, AffiliateMember (Honorary gets put into the ProfessionalMember WP role).  During that periodic synchronization, a WP user that is not a current Association member will get set to the Subscriber WP role.  This logic is contained within the civi\_member\_sync WP plugin.  The plugin is discussed in more detail below.

The Annual Conference registration system can query, through a JSON-returning Web service, the current membership state of a particular email address.  This Web service queries the WordPress role for the WordPress user associated with that email address, and does not have the capability of querying CiviCRM's data directly for membership status, even though it does to get the users's organization name.  It uses the WordPress role as the authoritative source of current membership status in order to not duplicate the logic civi\_member\_sync uses to identify current membership status. 

## civi_member_sync WP plugin

*NOTE: this was a brain dump as of late 2013 / early 2014.  Current details on CiviDesk, as of early 2019, may differ, but probably don't because I (jdw) don't think CiviDesk worked with this code.  But maybe they did?*

As best as I (jdw) can tell based on diffs, we're running a slightly modified version of [Wordpress-CiviCRM-Member-Role-Sync](https://github.com/jeevajoy/Wordpress-CiviCRM-Member-Role-Sync/commit/5773be2d4afbc05c7cba2cd2fd74e0fed38ff28c) even though there are newer versions [here](https://github.com/tadpolecc/civi_member_sync) and [here](https://github.com/christianwach/civi_member_sync/tree/cmw-refactor).

Modifications include:

* refusing to perform role synchronization on WP users who are already in the "administrator" or "eventcoordinator" roles, instead of just the "administrator" role.
* using $wpdb->prefix instead of hard-coded wp\_
* invocation of `civicrm_initialize()` instead of `civicrm_wp_initialize()`

Synchronization happens, as best as I (jdw) can tell, at:

* action `wp_login` for the logging-in user
* action `wp_logout` for the logging-out user
* when a "manual sync" is invoked by an administrator through the web interface, for each user returned by WP's `get_users()` 

It is unclear exactly when the WordPress user account is created for a new user in the CiviCRM system.

## TODO related to Membership Roles

*NOTE: these are early 2014 TODOs.  It'd probably be prudent to prune/update these when Tadpole is fully onboard*

* Identify when a new WP user is created for a new paying CiviCRM member
* Remediate synchronization delays between an individual's current membership status in CiviCRM and their membership WordPress role.  If we can be sure there's always a WordPress user for every current Association member then we can modify `hewebmembershipinfo_oauth()` to invoke civi\_member\_sync's `civi_member_sync_check` or `member_check`.  Additionally, if we can create a WordPress user for an email address that has no WP user but does exist in the CiviCRM database, then we can autocreate that WP user.  Care must be taken to ensure we don't create multiple WP users for the same CiviCRM contact, which would happen under these circumstances for a user that gave an email address which was not the one associated with their Membership WP user but was associated with their CiviCRM record.
* ... consider wether or not to allow use of alternate email addresses associated with a single CiviCRM contact for identification of a discount in the Annual registration system.  This is complicated by the fact that we're relying on the existing behavior to ensure only one discount is being given per individual Association membership.  (jdw would recommend leaving it as-is right now which is only allowing one WP user for each CiviCRM contact, and requiring the email address used in the Annual Conference registration system to match the one used in WP).

# Changes, updates and configurations maintained inside CiviCRM and its source tree

*NOTE: this section (and the Other CiviCRM upgrade tasks subsection of this section) covered things one needed to be aware of to upgrade the CiviCRM codebase when it was running on WPEngine.  We had to patch it to handle a few things: non-authenticated WPEngine requests not getting write access to the filesystem (smarty templates require write access), wpengine only ran php 5.3.2 once upon a time, but civi "required" a later version, which we figured was due to security issues, so we patched civi to not complain*

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

*NOTE: old, for WPEngine hosting, not CiviDesk or Pantheon*

Get Jason or Curtiss or Chad to add you and your SSH key be added to `hewmembership`.

## Staging

*NOTE: old, for WPEngine hosting, not CiviDesk or Pantheon*

Use this for tests.  See WPEngine docs for how to update staging to latest from production.

* `git remote add wpengine-staging git@git.wpengine.com:staging/hewmembership.git` if not already done locally
* `git push wpengine-staging <working_branch_name>:master`


## Production

*NOTE: old, for WPEngine hosting, not CiviDesk or Pantheon*

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
