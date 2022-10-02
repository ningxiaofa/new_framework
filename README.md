Start Server <br/>
```bash
php -S localhost:8100 -t ./public
```

Load composer requirements
```bash
php72 composer.phar require filp/whoops
or 
php composer.phar require filp/whoops
```
will generate composer.json & composer.lock, of course, have vendor dir.

URL
```bash
http://localhost:8100/index.php?index/index
```