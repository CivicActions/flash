#CivicActions DHS FLASH demo
@todo: write "tagline"


##Links:

* Try our prototype: https://flash.civicactions.com/ @todo fix
* Trello sprint planning: https://trello.com/b/D3cR8yXJ/flash-rehearsal-1 @todo update



## The Technology
@todo include language from README-old.md?

Building on experience, we began in the very first Sprint to implement an automatic deployment system with fully automated testing and fully automated deployment of the candidate build. This used "infrastructure as code" instantiating a new server instance for each deploy, then using Docker and Bowline to orchestrate containers. We have a Slack command that anyone
can use to initiate a Jenkins build.

The actual technology is a backbone of Drupal 8 styled with Bootstrap, although a user is unlikely to be aware of that, since we significantly simplified the user interface, and installed it in such a way that it appears to be an iOS or Android app. In actuality it is a mobile-friendly website.

# Following the USDS Playbook

We follow the USDS Playbook closely.  As documentation of this, we us the explicit checklist published by the USDS with specific evidence and answers for each relevant checklist item:

[USDS checklist](https://github.com/CivicActions/agile-california/blob/master/documentation/usds-checklist.md)


## The Explicit RFI Requirements
@todo: write/refine/redorder

The RFI calls out items (a-q) below as requiring explicit reference. We have not duplicated the headings, but only our evidence for having completed each of the required items.

a. A Product Owner was given overall responsibility (Robert L. Read).

@todo:
b. Our team consisted of seven persons in the following roles: Product Owner, Agile Coach, Technical Architect, Back End Web Designer, Front End Web Designer, Interaction Designer/User
Researcher/Usability Tester, and Delivery Manager.  Engineers also doubled as DevOps engineers. More information about the roles we designated, and the personnel we assigned to these roles, can be found in our [project roles](https://github.com/CivicActions/flash/blob/master/documentation/project-roles.md) file. 

e. We leveraged Bootstrap as an open-source style and made a few header and footer design choices. We outlined our [reasoning for this choice here](https://github.com/CivicActions/flash/blob/master/documentation/style-guide.md). We chose to include the CHHS logo and favicon so that the prototype would include branding as established by the California Health and Human Services organization.

@todo
f. A foster parent test user performed usability testing. We used ourselves as additional user testers.

@todo
g. Each of the the first 5 sprints involved user feedback that immediately influenced our design. Further, our own [Retrospectives](https://github.com/CivicActions/flash/tree/master/call-notes) captured our learnings from each sprint and our plans to modify future sprints in light of these learnings. 

h. Using fully responsive open-source technology, we tested with both mobile phones and desktop environments.

i. We used the following core technologies:

1. [Drupal 8](https://www.drupal.org/8)
2. [Bootstrap](http://getbootstrap.com/)2
@todo: add.

Additionally we used [Ubuntu](http://www.ubuntu.com) (as the Docker Machine host operating system), [Docker](https://www.docker.com/products/docker-engine), [Docker Compose](https://www.docker.com/products/docker-compose), container operating systems (minimal [Debian](https://www.debian.org/)), [Apache httpd](https://httpd.apache.org/), [MariaDB](https://mariadb.org/), monitoring ([uptime](https://github.com/fzaninotto/uptime)), testing ([Selenium Builder](https://github.com/SeleniumBuilder/se-builder), [se-interpreter](https://github.com/Zarkonnen/se-interpreter)), deployment tools ([Docker Machine](https://www.docker.com/products/docker-machine), [AWS CLI](https://github.com/aws/aws-cli), [CloudFlare CLI](https://github.com/danielpigott/cloudflare-cli)), automation ([Jenkins](https://jenkins.io/), [Bowline](https://github.com/davenuman/bowline)), [PHP](https://secure.php.net/), PHP libraries ([Symfony](https://symfony.com/)) and frontend frameworks ([Bootstrap](https://getbootstrap.com/), [jQuery](https://jquery.com/)).

j. We deployed the prototype to Amazon Web Services (AWS), a FedRAMP compliant IaaS provider. Additionally, CloudFlare was used for CDN, SSL and DNS automation.

k. End-to-end tests for mobile and desktop viewports were developed using the open-source [Selenium Builder](https://github.com/SeleniumBuilder/se-builder) testing framework. Tests were run in fully managed Docker based [Google Chrome](https://hub.docker.com/r/selenium/standalone-chrome/) and [Mozilla Firefox](https://hub.docker.com/r/selenium/standalone-firefox/) Selenium driven browsers, to test our profile and mapping functionality.

l. We used Jenkins to run the automated tests on each candidate deploy and notify us immediately on Slack if tests passed of failed. Tests were automated using the [se-interpreter](https://github.com/Zarkonnen/se-interpreter) runner and run in Firefox and Chrome browsers.

m. We used an Infrastructure as Code (IaC) methodology to manage all infrastructure and configuration. Upon triggering a deploy with a Slack command, Jenkins runs a [deploy script](https://github.com/CivicActions/flash/blob/master/bin/deploy) that creates a new "candidate" AWS EC2 server instance with Docker Machine, brings up Docker containers to host the site, installs the site software, runs the test suite and (if the tests pass) switches DNS to make the candidate live. The immediate prior live container is retained online in case it is needed for fail back. This entire process happens with no manual interaction and encapsulates all the configuration (deploy script, Docker Compose configuration and site configuration) in the project Git repository.

n. We set up continuous monitoring of application status and response time using open source [uptime](https://github.com/fzaninotto/uptime) software. This produces summary/historical reports and charts, and will send e-mail alerts if an issue is detected.

o. We use [Docker](https://www.docker.com/) together with [Docker Machine](https://docs.docker.com/machine/overview/) for Docker host management and [Docker Compose](https://docs.docker.com/compose/overview/) for container orchestration and configuration management.

p. The [devops-manual](https://github.com/CivicActions/flash/blob/master/documentation/devops-manual.md) describes how to install and run the prototype on a local sandbox, deploy the application to AWS and configure a continuous delivery (integrated testing and deployment) automation job.  The [developer-manual]https://github.com/CivicActions/flash/blob/master/documentation/devops-manual.md) describes how to make updates and create Pull Requests.

q. Our entire software stack is open source and provided free of charge. All licenses are documented in associated [LICENSE.md](https://github.com/CivicActions/flash/blob/master/LICENSE.md).
