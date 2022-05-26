# melp

php frontend for meilisearch

## how to use

1. set the `$url` variable and optionally the `$title` variable

2. make a function called `handleItem` that accepts a single result row

3. stick `require('melp.php');` at the end

for an example of this, see `example.php`

## dic2meili.jq

if you have a json object thats a dictionary instead of a list, you can
rearrange it to a list by piping into this, so that meilisearch accepts it

```
jq -f dic2meili.jq
```

note that this reads the entire object into ram, so it is not suitable
for massive datasets. help wanted on making this a jq stream so it can
accept arbitrarily large stuff

