# convert a json dictionary to a meilisearch compatable
# array

to_entries | map({id: .key} + .value)

