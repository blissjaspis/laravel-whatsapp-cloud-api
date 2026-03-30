# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [2.0.0] - 2026-03-30

### Added
- Initial release of the Laravel WhatsApp Cloud API package
- Support for sending text messages
- Support for sending media messages (image, document, audio, video, sticker)
- Support for sending template messages
- Support for sending location messages
- Support for sending contact messages
- Support for reaction messages
- Support for location request messages
- Support for marking messages as read
- Support for media upload, download, retrieve and delete operations
- Facade support for easier usage
- Configuration file for WhatsApp Cloud API credentials
- Support for Laravel 11 and 12

### Fixed
- Fixed typo in config: `bussiness_phone_number_id` changed to `business_phone_number_id`
- Fixed code style issues across the codebase
- Fixed PHPStan static analysis errors

## [0.1.0] - 2025-03-30

### Added
- Initial development release
