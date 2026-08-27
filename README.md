# TgApiKit

TgApiKit is a code generator (scaffolder) for the Telegram Bot API, targeting the [TGram](https://github.com/al3x5dev/tgram) PHP library. Its primary purpose is to scrape the Telegram Bot API to generate and update Telegram-defined entities and methods within the TGram framework.

## Features

- Specific scraping of the Telegram Bot API for TGram.
- Automatic generation and updating of PHP entities and methods defined by Telegram for the TGram framework.

## Prerequisites

- PHP 8.2 or higher.
- Composer installed.

## Installation

This library can be installed with Composer:

```bash
composer require mk4u/tgapikit
```

## Usage
This library is designed exclusively for updating the TGram library. To use this tool and update entities and methods, simply type the following command in your console:

```bash
php vendor/bin/update-api 
```

> [!NOTE]
> This tool is intended solely for updating the TGram library. It is not designed for use with other frameworks or libraries.

## License
This project is licensed under the [MIT License](LICENSE).
