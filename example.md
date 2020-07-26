# example structure

## definitions
* **record**: a named item in a database that contains named fields; can have a schema
* **field**: a field in a **record** that contains a value; a field may be another record; a collection of records; or it may be any other value
* **item**: refers to anything in the database, can be either a field or a record
* **database**: convenience term for the root node of the database which is just a **record**; and can have a schema like any other record in
  the database

### albums

* Album (record)
* -> Name (text)
* -> Date_created (date)
* -> Images (collection)
* -> -> image-1 (record)
* -> -> -> Name (text)
* -> -> -> Image (image)
* -> -> image-2 (record)
* -> -> -> Name (text)
* -> -> -> Image (image)

### config file
* config (record)
* -> site_name (text)
* -> created_date (date)