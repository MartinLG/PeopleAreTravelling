set :domain, "188.165.231.116" # adresse du serveur de production
set :deploy_to, "/srv/http/" # répertoire ou déployer
set :app_path, "app"

set :repository, "git@github.com:MartinLG/PeopleAreTravelling.git" # adresse du scm
set :scm, :git
# Or: `accurev`, `bzr`, `cvs`, `darcs`, `subversion`, `mercurial`, `perforce`, `subversion` or `none`
set :deploy_via, :copy

set :model_manager, "doctrine"
# Or: `propel`

role :web, domain # Your HTTP server, Apache/etc
role :app, domain # This may be the same as your `Web` server
role :db, domain, :primary => true # This is where Rails migrations will run

set :use_sudo, false
set :use_composer, true
set :keep_releases, 3

set :user, "root"