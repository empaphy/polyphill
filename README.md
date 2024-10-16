# polyphill
_The one-size-fits-all polyfill for PHP._

Polyphill is a metapackage for PHP that installs the polyfills you need, and
removes those that are redundant.

## Installation

```bash
composer require 'empaphy/polyphill:^1'
```

## How does it work?

Polyphill does some clever composer dependency tricks to ensure that polyfills
are only installed if your composer dependencies contain an explicit
requirement for a polyfillable extension not natively provided by your platform.

This keeps your vendor directory free from unused packages in the best-case
scenario, while ensuring maximum compatability on environments that miss any
required extensions.
