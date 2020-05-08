## Number of packages displayed by brew search
> brew search | wc -l

## Search for postgres package
> brew search postgres

## Install a package 
> brew install tree

## Directory where brew installs packages
> /usr/local/Cellar

## Show information about tree package
> brew info tree

## Uninstall tree package 
> brew uninstall tree

## Show installed packages
> brew list 

## Update all packages
> brew update

## Show outdated packages
> brew outdated

## Upgrade outdated packages
> brew upgrade

## Remove older versions of packages
> brew cleanup

## Diagnose your system (searching for problems relating to your system and brew)
> brew doctor

## Install MacOS applications with cask (moves application to /Applications/ folder)
> brew cask install firefox

## Show info about MacOS application
> brew cask info pycharm

## Open application homepage
> brew cask home pycharm

## Tap a package that doesn't exist in brew
> brew tap heroku/brew
