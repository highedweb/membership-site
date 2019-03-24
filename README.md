# Membership Site (CiviCRM) on Pantheon

Moved old content to [HISTORY](HISTORY.md).

## Using this repo with Pantheon

Recommended workflow:

* Setup a development environment with a clone of this repo.
* Add an upstream remote to Pantheon.
* Pull it to a separate branch.
* Make changes in a temporary branch.
* Merge to both branches.
* Push to both remotes.

Example:

```
git clone git@github.com:highedweb/membership-site.git
git remote add pantheon <<Pantheon dev remote URL>>
git fetch pantheon
git checkout -b pantheon pantheon/master
git checkout master
```

Create temporary banch...

```
git branch -b temp-branch-name
git checkout temp-branch-name
```

You will likely need to change the default setting for [git push.default](https://git-scm.com/docs/git-config#Documentation/git-config.txt-pushdefault) as remote branch name does not match local:

```
git config push.default current upstream
```

Make changes as required and commit... then:

```
git checkout pantheon
git merge temp-branch-name
git push

git checkout master
git merge temp-branch-name
git push
```

Delete temporary branch:

```
git branch -d temp-branch-name
```
