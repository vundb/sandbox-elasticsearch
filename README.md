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
