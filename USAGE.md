# Dojo Test

### Exercise

http://dojopuzzles.com/problemas/exibe/palavras-primas/

### Install dependencies

```bash
$ composer install
```

### Test application

Running unit tests:

```bash
$ vendor/bin/phpunit -c build/
```

Running code style:
```bash
$ ./vendor/bin/phpcs -sw --standard=PSR2 app/ tests/
```

Running copy-paste detector:
```bash
$ vendor/bin/phpcpd --verbose app/ tests/
```

Running mess detector:
```bash
$ vendor/bin/phpmd app/ text codesize
```

Running Object Calisthenics rules:
```bash
$ vendor/bin/phpcs app/ tests/ -sp --standard=vendor/object-calisthenics/phpcs-calisthenics-rules/src/ObjectCalisthenics/ruleset.xml
```

### Usage

From CLI:

```bash
$ php public/index.php
```
