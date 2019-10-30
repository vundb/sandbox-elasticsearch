# sandbox-elasticsearch #

## ON LINUX ##

Check the 'max_map_count'

```bash
grep vm.max_map_count /etc/sysctl.conf
vm.max_map_count=262144
```

Modify if set wrong. You can also write the line in the config file.

```bash
sysctl -w vm.max_map_count=262144
```

## HOW TO ##

Install dependencies.

```bash
composer install
```

Start docker environment.

```bash
docker-compose up -d
```

Ensure all services are running.

```bash
docker ps
```

Prepare MySQL data.

```bash
bin/console doctrine:schema:update --force
```

Generate 1000 (or on your own) random entities.

```bash
bin/console app:super-hero:generate 1000
```

Populate everything to Elasticsearch.

```bash
bin/console fos:elastica:populate
```

Start symfony web server.

```bash
bin/console server:start
```

Run example search query.

```bash
http://127.0.0.1:8000/superhero/search?q=QUERY
```
