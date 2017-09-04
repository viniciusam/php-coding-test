## PHP Coding Test

### Task3
This program will read a file in JSON format and create an ordered list of the boarding cards. The JSON format is the following:
```
[
    
    {
        "type"    -> AIRPLANE, TRAIN, BUS 
        "code"    -> Boarding Pass Code
        "gate"    -> Gate Number
        "from"    -> Origin
        "to"      -> Destination
        "seat"    -> Seat Information (NULLABLE)
        "baggage" -> Baggage Information - Gate or AUTO (NULLABLE)
    },
    ...
]
```

#### Executing
```
cd task3
php -e app.php
```

#### Using a Different Data File
```
cd task3
php -e app.php file.json
```
