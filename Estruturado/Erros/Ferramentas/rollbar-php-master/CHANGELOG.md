# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [2.1.0] - 2020-07-01
### Added
- Added support for PHP 7.3 and 7.4.

## [2.0.0] - 2019-10-02
The master branch and the v2.x series will continue full support for PHP >= 7.1.
Full support for PHP 7.0 will continue in branch v1.x until PHP 7.0 EOL (Jan 1st 2020).
Security fixes only support for PHP less than 7 will continue in branch v1.x.
### Changed
- Make the SDK compatible with Monolog 2.0.0.

## [1.8.1] - 2019-05-06
### Fixed
- Add monolog dependency #458

## 1.8.0 - 2019-05-03 [YANKED]
### Removed
- Remove commitizen setup; prefer global usage instead #450
### Changed
- Standardized dev options: enabled, transmit, output, verbose #456
- Increase memory limits for php5.3 in Travis CI #452
- Make the repo commitizen-friendly #447
- Updated rollbar.js snippet to the latest version (v2.6.1)
### Added
- Configurable Exception Raising for rollbar.log #449
- Amended PR: Add to config minimumLevel option #442

## [1.7.5] - 2019-03-04
### Removed
- HHVM does not support PHP language anymore #438
### Fixed
- Respect the result of any user-defined error handling #437

## [1.7.4] - 2019-01-02
### Fixed
- #431 Extra Custom data not showing in Rollbar

## [1.7.3] - 2019-01-02
### Fixed
- #426 Typo in EncodedPayload->decreaseSize
- #429 Symfony\Component\Debug\Exception\FatalErrorException: Error: Uncaught Exception: Cannot rewind a generator that was already run in /vendor/rollbar/rollbar/src/Utilities.php:102

## [1.7.2] - 2018-12-17
### Fixed
- #425: StringStrategy.php bug setting $strlen
- #427: Not all keys traversed.
- #424: Truncation constant doesn't seem to match documentation

## [1.7.1] - 2018-11-12
### Fixed
- Bump version to 1.7.1

## [1.7.0] - 2018-11-06
### Fixed
- #389 Logger sends context in body and custom
- #413 Duplicated text in error message
### Added
- #391 Add max items config option
- #416 Implement cycle checks for serialization
- #418 Add documentation for max_nesting_depth option in the docs
- #414 Allow users to specify a max nesting level
- #404 Performance Benchmark for Rollbar:init()
- #403 Support and test newer HHVM
- #411 Add a full range of HHVM versions to Travis builds

## [1.6.3] - 2018-09-06
### Added
- #404 Performance Banchmark for Rollbar::init(): autodetect_branch config option set to false by default which stops the SDK from performing CPU-time heavy git branch lookup
### Removed
- removed internal logging to /tmp
### Fixed
- fixed the build for HHVM

## [1.6.2] - 2018-08-14
### Fixed
- #398 Fix $scrubbedPayload missing definition
- #399 NUL files being written all over the place

## [1.6.1] - 2018-08-06
### Fixed
- #393 Missed variable $scrubbedPayload definition in send method on FluentSender

## [1.6.0] - 2018-08-06
### Changed
- Improved tagging instructions in README.md
- PR 386: Update README.md
- PR 390: Set fingerprint and title using string instead of callback.
- #380 Drop temporary Rollbar\Monolog\Handler\RollbarHandler in favor of the merged pull request in the Monolog repo
### Fixed
- #381 getUserIp looks at HTTP_X_FORWARDED_FOR then overwrites it anyway
- #387 Truncation strategies do not truncate Frame objects
- #350 PHP Interface, log() method isn't handling fingerprint as documented
- #382 default settings for ServerBranch causes error on windows
- #384 Undefined offset when when adding context
### Added
- #385 Enhancement: Better argument type information
- #351 Ability to send additional runtime data

## [1.5.3] - 2018-06-18
### Fixed
- #374 Rollbar fails to get git branch if allow_exec false and no default set
- #379 Stacktrace returns Empty Frames

## [1.5.2] - 2018-06-11
### Changed
- #346 Refactor \Rollbar\Defaults
- #330 Rename jsonSerialize methods in all \Rollbar\Payload classes
- #373 Rename object property names to follow an appropriate convention in the Config class
- #338 Rename checkIgnore config option to followo the underscore convention like other options
- #368 Update README.md
### Removed
- #331 Remove the leftover direct call to json_encode in AgentSender.php
### Added
- #361 Add curl option for CA certificate




## [1.5.1] - 2018-05-20
### Added
- #367 Newest version 1.5.0 missing changelog, Notifier version not bumped
- #366 Make the anonymized IP addresses indexable
### Removed
- Removed `CHANGELOG.md` in favor of using [release notes](https://github.com/rollbar/rollbar-php/releases)

## [1.5.0] - 2018-05-17
### Fixed
- #362 - Fix running isolated tests by requiring the Config.php file with ROLLBAR_INCLUDED_ERRNO_BITMASK definition
### Changed
- #353 - Only collect person.id by default for person tracking
- #355 - Anonymize IP address config option
### Added
- #354 - Allow IP collection to be easily turned on and off in config

## [1.4.1] - 2018-03-17
### Added
- Temporarily add `\Rollbar\Monolog\Handler\MonologHandler` until `Seldaek:monolog` PR 1042 gets merged into their `master`
- Lock Monolog dependency at `^1.23`. The implementation of `\Monolog\TestCase` class in their master is currently not stable
- Add instructions on using Rollbar with Monolog after bringing the `MonologHandler` into this repo
- Refactor JSON encoding mechanis to limit calls to `json_encode` to minimum with `\Rollbar\Payload\EncodedPayload`
- Optimize performance of `StringsStrategy` and `FramesStrategy` truncation strategies
- Add `composer performance` command to run performance test suite
### Removed
- Remove `RawStrategy` and `MinBodyStrategy` completely (they are not adding any value - the same results are achieved by the combination of other strategies)
### Fixed
- Fix for non-encodable values in the payload data. This was occasionally causing `400` response codes from the API
### Changed
- Update code examples in [README.md]
- Clean up `RollbarLogger` instances after each test in the testsuite so the configuration doesn't persist between test cases

## [1.4.0] - 2018-02-06
This release refactors error, fatal error and exception handling from the ground up.

### Added
- Add internal SDK debugging with `verbosity` configuration option
- `local_vars_dump` configuration option is now enabled by default
- Add enable / disable functionality to Rollbar class and `enabled` configuration option
### Fixed
- Fix a bug where `E_USER_ERROR` type errors were reported twice
### Changed
- Update rollbar.js snippet to v2.3.6
- Exception traces will now include an additional frame with the file name and line
  where the Exception was actually thrown
- `Rollbar`'s class proxy methods will now return the return value of the proxied method

## [1.3.6] - 2017-12-02
### Fixed
- Replace a leftover invocation to exec() with shell_exec()
- Eliminate error duplication on PHP 7+ / Symfony environments by expanding ignore to all Throwables
[293](https://github.com/rollbar/rollbar-php/issues/293)

## [1.3.5] - 2017-11-14
### Fixed
- Fix sending $context argument from the log() method with exception logs.

## [1.3.4] - 2017-11-11
### Changed
- Increase the minimum version constraint for the monolog/monolog package to support composer --prefer-minimum
- Decrease the minimum version constraint for psr/log package to match the monolog/monolog package in --prefer-minimum
### Added
- Add support for dynamic custom data

## [1.3.3] - 2017-10-27
### Removed
- Remove fluent/logger from the required section of composer.json

## [1.3.2] - 2017-09-20
### Added
- Performance improvements
### Changed
- Include request body for PUT requests if `include_raw_request_body` is true

## [1.3.1] - 2017-08-02
### Fixed
- Actually change the notifier version number constant
### Removed
- Remove dependency on rollbar.js through composer
### Changed
- Stop duplicate logging some errors [#240](https://github.com/rollbar/rollbar-php/pull/240)

## [1.3.0] - 2017-07-31
### Fixed
- all of the senders should return a response
[#239](https://github.com/rollbar/rollbar-php/pull/239)
- Minor spacing and indentation on Scrubber
[#234](https://github.com/rollbar/rollbar-php/pull/234)
- Performance fixes
[#217](https://github.com/rollbar/rollbar-php/pull/217)
### Added
- GitHub Issue #225: Allow custom JS addition in RollbarJsHelper
[#235](https://github.com/rollbar/rollbar-php/pull/235)
- GitHub Issue #227: Add curl_error() to check for log submission failures
- configuration option to disallow calling exec to get git information
[#223](https://github.com/rollbar/rollbar-php/pull/223)
- GitHub Issue #144: allow passing ROLLBAR_TEST_TOKEN in phpunit arguments
[#219](https://github.com/rollbar/rollbar-php/pull/219)
### Changed
[#231](https://github.com/rollbar/rollbar-php/pull/231)
- GitHub Issue 229: Make fluentd a suggest requirement rather than mandatory
[#230](https://github.com/rollbar/rollbar-php/pull/230)
- add an explicit semicolon between snippet and custom js
[#238](https://github.com/rollbar/rollbar-php/pull/238)
- Github Issue 226: Update rollbar.js code snippet
[#228](https://github.com/rollbar/rollbar-php/pull/228)
- use the configuration array directly, don't nest it under options
[#222](https://github.com/rollbar/rollbar-php/pull/222)

## [1.2.0] - 2017-07-05
### Added
- Add the `use_error_reporting` option back: [#182](https://github.com/rollbar/rollbar-php/pull/182)
- Add a helper method to inject the javascript snippet into views:
  [#186](https://github.com/rollbar/rollbar-php/pull/186)
- Add option to include some local variables to stack traces:
  [#192](https://github.com/rollbar/rollbar-php/pull/192)
- Address an issue reading from php://input for PHP less than 5.6 and provide a workaround:
  [#181](https://github.com/rollbar/rollbar-php/pull/181)
- Add static helper methods for Level: [#210](https://github.com/rollbar/rollbar-php/pull/210)
- Add a whitelist to prevent scrubbing of specific fields:
  [#216](https://github.com/rollbar/rollbar-php/pull/216)
- Allow sampling for exceptions: [#215](https://github.com/rollbar/rollbar-php/pull/215)
### Changed
- No longer ignore the native PHP error handler:
  [#175](https://github.com/rollbar/rollbar-php/pull/175)
### Fixed
- Fix for when `HTTP_X_FORWARDED_PROTO` includes multiple values: [#179](https://github.com/rollbar/rollbar-php/pull/179)
- Fix a backwards compatibility bug with `base_api_url` which has since been deprecated in favor of
  `endpoint`: [#189](https://github.com/rollbar/rollbar-php/pull/189)
- Correctly reverse frames in a stacktrace: [#211](https://github.com/rollbar/rollbar-php/pull/211).
  NOTE: this behaviour is consistent with this library for versions less than 1.0, we consider it a
  bug that the frames were in the wrong order for versions 1.0.0 to 1.1.1. However, this change will
  cause the fingerprints of errors to change and therefore may result in some errors showing up as
  new when in fact they already existed with the stack trace in the opposite order.

## [1.1.1] - 2017-05-16
### Fixed
- Forgot to bump the version number in the README and in the Notifier configuration.

## [1.1.0] - 2017-05-16
This release includes some new features, some improvements to existing functionality, and several
bug fixes. Below are the highlights of issues/PRs that are included in this release:
### Fixed
- Fix how include_error_code_context works with defaults [#168](https://github.com/rollbar/rollbar-php/pull/168)
- Fix how we handle scrubbing related to query strings so that we don't accidentially urlencode
  things that should not be, such as sql queries [#164](https://github.com/rollbar/rollbar-php/pull/164)
- Bug: infinite loop when previous exception set [#158](https://github.com/rollbar/rollbar-php/pull/158) (@vilius-g)
- Bug: checkIgnore was not getting passed documented arguments [#152](https://github.com/rollbar/rollbar-php/pull/152)
### Changed
- GitHub Issue [#38](https://github.com/rollbar/rollbar-php/issues/38): truncate payload [#167](https://github.com/rollbar/rollbar-php/pull/167)
- GitHub Issue [#72](https://github.com/rollbar/rollbar-php/issues/72): status 200 when using set_exception_handler [#143](https://github.com/rollbar/rollbar-php/pull/143)
- Move packfire/php5.3-compat from require to suggest in composer.json [#169](https://github.com/rollbar/rollbar-php/pull/169) (@elazar)
### Added
- GitHub Issue [#102](https://github.com/rollbar/rollbar-php/issues/102): Support the Forwarded (RFC 7239) header [#155](https://github.com/rollbar/rollbar-php/pull/155)
- GitHub Issue [#53](https://github.com/rollbar/rollbar-php/issues/53): Option to capture stack trace in report_message() [#145](https://github.com/rollbar/rollbar-php/pull/145)
- Only report legitimate fatal errors during shutdown rather than anything returned by
  error_get_last(), Fatal handler type check [#161](https://github.com/rollbar/rollbar-php/pull/161) (@vilius-g)

## [1.0.1] - 2017-05-01
### Changed
- Update notifier to send the correct version number in the payload
### Fixed
- Bug fix related to scrubbing potential query strings

## [1.0.0] - 2017-04-28
Almost everything has been refactored or rewritten. The updated README has all of the current
information on how to use the notifier. This release includes API that is backwards compatible with [0.18.2],
however this is for convenience only and the methods that have changed have been marked deprecated.

## [0.18.2] - 2016-07-05
### Removed
- Removed type hinting from RollbarException

## 0.18.1 [YANKED]
### Added
- Added configuration switch for disabling UTF-8 sanitization

## [0.18.0] - 2016-05-26
### Added
- Added support for checkIgnore function See [#82](https://github.com/rollbar/rollbar-php/pull/82)

## [0.17.0] - 2016-04-27
### Changed
- Accidental tag of documentation change. No API change present.

## [0.16.0] - 2016-04-22
### Added
- Added support for reporting errors in Command Line Scripts.
- Added (opt-in) support for capturing line of code and context around that code in stack traces. See [#76](https://github.com/rollbar/rollbar-php/pull/76)
- Added Level class with string constants for Level values.
### Fixed
- Fixed the severity level that E_PARSE errors are reproted at. See [#75](https://github.com/rollbar/rollbar-php/pull/75)
- Captured \Throwable rather than \Exception if using PHP 7

## [0.15.0] - 2015-07-28
### Changed
- Fix bug where `scrub_fields` were case-sensitive, instead of case-insensitive as the docs say. See [#63](https://github.com/rollbar/rollbar-php/pull/63)
- Fix bug where integer 0 keys would always be scrubbed. See [#64](https://github.com/rollbar/rollbar-php/pull/64) and [#65](https://github.com/rollbar/rollbar-php/pull/65)
- Fix detection of the current URL when the protocol is `https` but no `SERVER_PORT` is set. See [#50](https://github.com/rollbar/rollbar-php/pull/50)

## [0.14.0] - 2015-06-22
### Changed
- Fix bug where generated UUIDs could overlap if the application calls `mt_srand()` with a predictable value, and then Rollbar methods are called later. Rollbar now calls `mt_srand()` itself. This shouldn't affect anyone, unless you happen to be relying on the sequence of numbers coming from mt_rand across Rollbar calls.

## [0.13.0] - 2015-06-16
### Changed
- Param scrubbing is now applied to query string params inside the request URL. See [#59](https://github.com/rollbar/rollbar-php/pull/59)

## [0.12.1] - 2015-06-04
### Fixed
- `branch` now defaults to null (meaning it will not be set) instead of `master`. This fixes a bug where the Rollbar UI wouldn't use the "default branch" setting because it was being overridden by the value sent by rollbar-php. See [#58](https://github.com/rollbar/rollbar-php/pull/58).

## [0.12.0] - 2015-06-03
### Changed
- Param scrubbing now accepts a regex string for the key name. Key names starting with `/` are assumed to be a regex.
- Headers are now scrubbed
- Arrays are recursively scrubbed

## [0.11.2] - 2015-05-27
### Fixed
- Fix issue where fatal E_PARSE errors were not reported. See [#55](https://github.com/rollbar/rollbar-php/issues/55)

## [0.11.1] - 2015-05-19
### Added
- Add in dependency for cURL library to warn users if they do not have the cURL extension installed ([#54](https://github.com/rollbar/rollbar-php/pull/54))

## [0.11.0] - 2015-04-03
### Added
- Added support for nested exceptions. See [#51](https://github.com/rollbar/rollbar-php/pull/51)
### Changed
- Calling report_exception with a non-exception will result in the data being dropped and a message being logged to the Rollbar logger, instead of an empty message being reported
- Exceptions are now sent as `trace_chain`, not trace, so any Custom Grouping Rules in the Rollbar UI will need to be updated to use `body.trace_chain.*.` in place of `body.trace.`

## [0.10.0] - 2015-03-30
### Added
- `report_exception` now accepts args for `extra_data` and `payload_data`, providing full access to the Rollbar API. See [#47](https://github.com/rollbar/rollbar-php/pull/47)
- Added a unit test suite running on Travis CI (running for PHP 5.3 and higher)
### Fixed
- Fix a json_encode warning with utf8 request param keys. See [#42](https://github.com/rollbar/rollbar-php/pull/42)
### Changed
- Moved `rollbar.php` inside `src/`

## [0.9.12] - 2015-03-06
### Fixed
- Fix PHP less than 5.4 compatibility. (Regression added in [0.9.11])

## [0.9.11] - 2015-03-02
### Added
- Added proxy support. ([#44](https://github.com/rollbar/rollbar-php/pull/44))

## [0.9.10] - 2015-02-11
### Added
- Add ability to send fingerprint, title, and other advanced payload options in `Rollbar::report_message()`.

## [0.9.9] - 2014-09-11
### Fixed
- Fix an error caused when `report_exception` is called with a non-object (e.g. `null`).

## [0.9.8] - 2014-08-28
### Fixed
- Fixes a bug where `iconv()` will sometimes throw an error, (#36).

## [0.9.7] - 2014-07-30
### Changed
- Force cURL to use IPV4 (`CURLOPT_IPRESOLVE_V4`) if supported ([#35](https://github.com/rollbar/rollbar-php/pull/35))

## [0.9.6] - 2014-07-08
### Changed
- No longer have `error_reporting()` prevent simple log message reports ([#33](https://github.com/rollbar/rollbar-php/pull/33))

## 0.9.5 [YANKED]
### Added
- Only define `ROLLBAR_INCLUDED_ERRNO_BITMASK` once to prevent warnings and test framework breakages ([#32](https://github.com/rollbar/rollbar-php/pull/32))

## [0.9.4] - 2014-06-24
### Added
- New `use_error_reporting` flag that when enabled will respect the current `error_reporting()` level when deciding to report an error ([#29](https://github.com/rollbar/rollbar-php/pull/29))
- Access token no longer required if using the agent handler

## [0.9.3] - 2014-06-05
### Changed
- Walk payloads to ensure strings are correctly utf-8 encoded for json encoding

## 0.9.2 [YANKED]
### Added
- Append timestamp (in milliseconds) to agent log file names, to prevent collisions.

## [0.9.1] - 2014-05-29
### Added
- Lazy create the agent log file ([#22](https://github.com/rollbar/rollbar-php/pull/22))

## [0.9.0] - 2014-05-23
### Added
- Added `included_errno`, which allows specifying which set of error levels to send to Rollbar (instead of everything below a certain level). This replaces `max_errno`.
- Added a performance optimization which sends the access token as a header.
### Changed
- Changed the default settings to no longer send E_NOTICE errors.
### Removed
- Removed the `max_errno` configuration option.

## [0.8.1] - 2014-04-29
### Added
- Added support for more seamless configuration on Heroku

## [0.8.0] - 2014-04-14
### Added
- Added ability to disable the notifier's fatal error handler ([#18](https://github.com/rollbar/rollbar-php/pull/18))

## [0.7.0] - 2014-03-17
### Fixed
- Fix regression introduced in [0.5.6] which would prevent the default php error handler from running, resulting in scripts no longer halting after such errors.

## [0.6.4] - 2014-03-13
### Changed
- Composer package definition optimizations
- Use subclass for Ratchetio backwards-compatibility layer instead of a `class_alias`

## [0.6.3] - 2014-03-05
### Fixed
- Fix issue where POST params could get clobbered while scrubbing
### Changed
- Convert internal methods from `private` to `protected` for better extensibility

## [0.6.2] - 2014-02-04
### Added
- Adding "pass" to default scrub fields

## [0.6.1] - 2014-02-03
### Fixed
- Respect `HTTP_X_FORWARDED_` http headers for request url construction

## [0.6.0] - 2014-01-20
### Changed
- Don't report errors suppressed with '@' by default

## 0.5.6 [YANKED]
### Added
- A UUID is now generated and sent with each item

## 0.5.5 [YANKED]
### Added
- Added `code_version` configuration setting

## 0.5.4 [YANKED]
### Fixed
- Fix E_WARNING when scrubbing a param that is an array

## 0.5.3 [YANKED]
### Added
- Scrub fields from session params too (instead of just POST). Add `csrf_token` and `auth_token` to list of default scrub fields.

## [0.5.2] - 2013-04-02
### Fixed
- Fix compatibility issue with PHP 5.2.

## 0.5.1 [YANKED]
### Added
- Adding ability to write to rollbar-agent files

## 0.5.0 [YANKED]
### Changed
- Rename to "rollbar"

## 0.4.2 [YANKED]
#### Added
- Added new default scrub params

## [0.4.1] - 2013-01-22
#### Added
- Added optional `extra_data` param to `report_message()`

## 0.4.0 [YANKED]
### Fixed
- Error handler function (`report_php_error`) now always returns false, so that the default php error handler still runs. This is a breaking change if your code relied on the old behavior where the error handler did *not* ever halt script execution.


[Unreleased]: https://github.com/rollbar/rollbar-php/compare/v2.1.0...HEAD
[2.1.0]: https://github.com/rollbar/rollbar-php/compare/v2.0.0...v2.1.0
[2.0.0]: https://github.com/rollbar/rollbar-php/compare/v1.8.1...v2.0.0
[1.8.1]: https://github.com/rollbar/rollbar-php/compare/v1.7.5...v1.8.1
[1.7.5]: https://github.com/rollbar/rollbar-php/compare/v1.7.4...v1.7.5
[1.7.4]: https://github.com/rollbar/rollbar-php/compare/v1.7.3...v1.7.4
[1.7.3]: https://github.com/rollbar/rollbar-php/compare/v1.7.2...v1.7.3
[1.7.2]: https://github.com/rollbar/rollbar-php/compare/v1.7.1...v1.7.2
[1.7.1]: https://github.com/rollbar/rollbar-php/compare/v1.7.0...v1.7.1
[1.7.0]: https://github.com/rollbar/rollbar-php/compare/v1.6.3...v1.7.0
[1.6.3]: https://github.com/rollbar/rollbar-php/compare/v1.6.2...v1.6.3
[1.6.2]: https://github.com/rollbar/rollbar-php/compare/v1.6.1...v1.6.2
[1.6.1]: https://github.com/rollbar/rollbar-php/compare/v1.6.0...v1.6.1
[1.6.0]: https://github.com/rollbar/rollbar-php/compare/v1.5.3...v1.6.0
[1.5.3]: https://github.com/rollbar/rollbar-php/compare/v1.5.2...v1.5.3
[1.5.2]: https://github.com/rollbar/rollbar-php/compare/v1.5.1...v1.5.2
[1.5.1]: https://github.com/rollbar/rollbar-php/compare/v1.5.0...v1.5.1
[1.5.0]: https://github.com/rollbar/rollbar-php/compare/v1.4.1...v1.5.0
[1.4.1]: https://github.com/rollbar/rollbar-php/compare/v1.4.0...v1.4.1
[1.4.0]: https://github.com/rollbar/rollbar-php/compare/v1.3.6...v1.4.0
[1.3.6]: https://github.com/rollbar/rollbar-php/compare/v1.3.5...v1.3.6
[1.3.5]: https://github.com/rollbar/rollbar-php/compare/v1.3.4...v1.3.5
[1.3.4]: https://github.com/rollbar/rollbar-php/compare/v1.3.3...v1.3.4
[1.3.3]: https://github.com/rollbar/rollbar-php/compare/v1.3.2...v1.3.3
[1.3.2]: https://github.com/rollbar/rollbar-php/compare/v1.3.1...v1.3.2
[1.3.1]: https://github.com/rollbar/rollbar-php/compare/v1.3.0...v1.3.1
[1.3.0]: https://github.com/rollbar/rollbar-php/compare/v1.2.0...v1.3.0
[1.2.0]: https://github.com/rollbar/rollbar-php/compare/v1.1.1...v1.2.0
[1.1.1]: https://github.com/rollbar/rollbar-php/compare/v1.1.0...v1.1.1
[1.1.0]: https://github.com/rollbar/rollbar-php/compare/v1.0.1...v1.1.0
[1.0.1]: https://github.com/rollbar/rollbar-php/compare/v1.0.0...v1.0.1
[1.0.0]: https://github.com/rollbar/rollbar-php/compare/v0.18.2...v1.0.0
[0.18.2]: https://github.com/rollbar/rollbar-php/compare/v0.18.0...v0.18.2
[0.18.0]: https://github.com/rollbar/rollbar-php/compare/v0.17.0...v0.18.0
[0.17.0]: https://github.com/rollbar/rollbar-php/compare/v0.16.0...v0.17.0
[0.16.0]: https://github.com/rollbar/rollbar-php/compare/v0.15.0...v0.16.0
[0.15.0]: https://github.com/rollbar/rollbar-php/compare/v0.14.0...v0.15.0
[0.14.0]: https://github.com/rollbar/rollbar-php/compare/v0.13.0...v0.14.0
[0.13.0]: https://github.com/rollbar/rollbar-php/compare/v0.12.1...v0.13.0
[0.12.1]: https://github.com/rollbar/rollbar-php/compare/v0.12.0...v0.12.1
[0.12.0]: https://github.com/rollbar/rollbar-php/compare/v0.11.2...v0.12.0
[0.11.2]: https://github.com/rollbar/rollbar-php/compare/v0.11.1...v0.11.2
[0.11.1]: https://github.com/rollbar/rollbar-php/compare/v0.11.0...v0.11.1
[0.11.0]: https://github.com/rollbar/rollbar-php/compare/v0.10.0...v0.11.0
[0.10.0]: https://github.com/rollbar/rollbar-php/compare/v0.9.12...v0.10.0
[0.9.12]: https://github.com/rollbar/rollbar-php/compare/v0.9.11...v0.9.12
[0.9.11]: https://github.com/rollbar/rollbar-php/compare/v0.9.10...v0.9.11
[0.9.10]: https://github.com/rollbar/rollbar-php/compare/v0.9.9...v0.9.10
[0.9.9]: https://github.com/rollbar/rollbar-php/compare/v0.9.8...v0.9.9
[0.9.8]: https://github.com/rollbar/rollbar-php/compare/v0.9.7...v0.9.8
[0.9.7]: https://github.com/rollbar/rollbar-php/compare/v0.9.6...v0.9.7
[0.9.6]: https://github.com/rollbar/rollbar-php/compare/v0.9.4...v0.9.6
[0.9.4]: https://github.com/rollbar/rollbar-php/compare/v0.9.3...v0.9.4
[0.9.3]: https://github.com/rollbar/rollbar-php/compare/v0.9.1...v0.9.3
[0.9.1]: https://github.com/rollbar/rollbar-php/compare/v0.9.0...v0.9.1
[0.9.0]: https://github.com/rollbar/rollbar-php/compare/v0.8.1...v0.9.0
[0.8.1]: https://github.com/rollbar/rollbar-php/compare/v0.8.0...v0.8.1
[0.8.0]: https://github.com/rollbar/rollbar-php/compare/v0.7.0...v0.8.0
[0.7.0]: https://github.com/rollbar/rollbar-php/compare/v0.6.4...v0.7.0
[0.6.4]: https://github.com/rollbar/rollbar-php/compare/v0.6.3...v0.6.4
[0.6.3]: https://github.com/rollbar/rollbar-php/compare/v0.6.2...v0.6.3
[0.6.2]: https://github.com/rollbar/rollbar-php/compare/v0.6.1...v0.6.2
[0.6.1]: https://github.com/rollbar/rollbar-php/compare/v0.6.0...v0.6.1
[0.6.0]: https://github.com/rollbar/rollbar-php/compare/v0.5.2...v0.6.0
[0.5.2]: https://github.com/rollbar/rollbar-php/compare/v0.4.1...v0.5.2
[0.4.1]: https://github.com/rollbar/rollbar-php/compare/f4e45dd265f86241951af32735e90e0c7f2a31e8...v0.4.1
