# Developer Manual

See the [Devops Manual](https://github.com/CivicActions/flash/blob/master/documentation/devops-manual.md) for complete installation instructions

#### Manual setup steps
@todo: are these still necessary?
* Uuid needs to match ./config/sync/system.site.yml:
 * drush config-set "system.site" uuid "a624e584-0f38-4329-8b20-571ebffddd38"
* Go to /admin/config/user-interface/shortcut/manage/default/customize, delete all shortcuts


### Install locally
```
﻿⁠⁠⁠⁠drush si config_installer sync﻿⁠⁠⁠⁠
```

### Making updates to Drupal
We are using the Drupal 8 Configuration Management (CMI) system.  CMI settings can be imported and exported with Drush:
```
drush config-export sync
# To export specific settings:
﻿⁠⁠⁠⁠drush config-get XXXXXXXXXX > ../config/sync/XXXXXXXX.yml﻿⁠⁠⁠⁠
﻿⁠⁠⁠⁠drush config-export #(follow up with 'n')﻿⁠⁠⁠⁠
```
CMI settings can also be managed within the Drupal interface: `/admin/config/development/configuration`.


### Pull requests

All developers should create a fork of the repo and set up their git configuration with two origins:
prime: CivicActions/flash
myfork: [GitHub username]/flash

Git should be configured for rebasing:
```
git config --global branch.autosetuprebase always
git config --get branch.master.rebase
```

To create a new branch for a Pull request:
```
git checkout master
git pull prime master
git checkout -b new-branch-name
git commit ...
git push myfork new-branch-name
```


### Deploying
Code can be deployed to the QA and production servers by entering [Slack](http://slack.com) commands:
```
# Deploy to QA server
/flash-deploy 
# @todo: Add additional commands here when we have them
```

#### Demo content

Demo users and content are automatically re-created after each deployment.  See the [create-demo-users](https://github.com/CivicActions/flash/blob/master/bin/create-demo-users) bash script for more details.


### Links
* Continuous integration server: http://ci.civicactions.net/job/flash-deploy
