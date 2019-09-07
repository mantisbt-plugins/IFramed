# IFRAMED CHANGE LOG

## Version 1.1.6 (September 6th, 2019)

### Documentation

- **readme:** rewording
- **readme:** udpate issues submit section
- **readme:** update info on rewrite rule if needed

### Bug Fixes

- clicking links within the iframed page does not readjust the frame height, it is stuck at the initial pages height.

## Version 1.1.5 (August 8th, 2019)

### Bug Fixes

- tgz release package does not contain the plugin directory as the top level

## Version 1.1.4 (August 3rd, 2019)

### Build System

- **ap:** add gzip tarball to mantisbt and github release assets

## Version 1.1.3 (August 1st, 2019)

### Bug Fixes

- randomly, the iframed windows vertical scrollbar is shown when page is not cross-domain and resized to the height of the content window.

## Version 1.1.2 (July 31st, 2019)

### Documentation

- **README:** add info on Content-Security-Policy header and cross domain links in an iframe
- **README:** update info on gistit

### Bug Fixes

- **CORS:** blocked cors requests cause frame to not be at least risized to the heigth of the parent container.

## Version 1.1.1 (July 29th, 2019)

### Build System

- add config to publishrc for first mantisbt release

### Documentation

- **README:** update ApiExtend badges

## Version 1.1.0 (July 27th, 2019)

### Documentation

- **readme:** update installation section and issues badge links
- **README:** update usage info

### Features

- add support for git gists

### Miscellaneous

- Update license to GPLv3

### Build System

- **app-publisher:** set interactive flag to N for non-interactive setting of new version during publish run (compliments of ap v1.10.4 update)

## Version 1.0.0 (July 25th, 2019)

### Chores

- Initial release

