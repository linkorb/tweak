Tweak: Define and manage settings in your application
=====================================================

Please refer to `test/test.php` for example usage:

## Use-cases

* Documented plugin or module settings
* Feature-flags, toggles, etc
* Application configuration
* Theme/template/layout tweaks

## Features

* Allows you to create setting definitions for UI generation, documentation, option lists, validation, sanity checks
* Define settings from code or load them from a `.yaml` file
* Setting values can be loaded from various sources (currently .json and .yaml supported)
* Hiera-style cascading configs based on context. For example: load app-specific, override for environment, and override again for current user.
* MultiLoader to support misc backends at the same time

## License

MIT (see [LICENSE.md](LICENSE.md))

## Brought to you by the LinkORB Engineering team

<img src="http://www.linkorb.com/d/meta/tier1/images/linkorbengineering-logo.png" width="200px" /><br />
Check out our other projects at [linkorb.com/engineering](http://www.linkorb.com/engineering).

Btw, we're hiring!
