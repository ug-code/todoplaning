# ToDoPlanning



DB setting
```shell
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=secret
```


```shell
composer install 
```
If you want docker install
```shell
docker-compose up -d --build

//use artisan command
docker-compose exec app bash

http://127.0.0.1:3000

```

If you want without docker
```shell
When working with Docker as the database, this line needs to be changed when running Artisan.Change .env file
DB_HOST=locahost

php artisan serve
http://127.0.0.1:8000
```

migration
```shell
php artisan migrate:fresh --seed
```

fetch all provider data
```shell
php artisan app:register-tasks
```

route:
```shell
Api doc
http://localhost:3000/request-docs

"Maximum efficiency with minimum effort."
//view
http://127.0.0.1:3000/todo/1  first mockup
http://127.0.0.1:3000/todo/2  second mockup
json
http://127.0.0.1:3000/api/v1/taskList/1 first mockup
http://127.0.0.1:3000/api/v1/taskList/2 second mockup

"A scenario that we distribute equally to all developers."
//json
http://127.0.0.1:3000/api/v1/taskListEqual/1 first mockup
http://127.0.0.1:3000/api/v1/taskListEqual/2 second mockup
//view
http://127.0.0.1:3000/todoEqual/1  first mockup
http://127.0.0.1:3000/todoEqual/2  first mockup

```


response json

```shell
{"data":{"totalEstimatedduration":38,"schedule":[{"period":"1 week","developers":{"DEV5":{"info":{"totalTask":8,"totalHour":38},"planning":[{"id":13,"level":5,"estimated_duration":8,"name":"Job Id 5"},{"id":12,"level":4,"estimated_duration":7,"name":"Job Id 4"},{"id":15,"level":3,"estimated_duration":6,"name":"Job Id 7"},{"id":9,"level":3,"estimated_duration":5,"name":"Job Id 1"},{"id":14,"level":2,"estimated_duration":4,"name":"Job Id 6"},{"id":10,"level":2,"estimated_duration":3,"name":"Job Id 2"},{"id":16,"level":1,"estimated_duration":3,"name":"Job Id 8"},{"id":11,"level":1,"estimated_duration":2,"name":"Job Id 3"}]},"DEV4":{"info":{"totalTask":0,"totalHour":0},"planning":[]},"DEV3":{"info":{"totalTask":0,"totalHour":0},"planning":[]},"DEV2":{"info":{"totalTask":0,"totalHour":0},"planning":[]},"DEV1":{"info":{"totalTask":0,"totalHour":0},"planning":[]}}}]}}
```

![image](https://github.com/user-attachments/assets/bf2d59b3-e515-4210-acc2-2481a7301e3e)

![image](https://github.com/user-attachments/assets/c9f0cfae-fee1-418f-9830-1665fb8d493a)


![image](https://github.com/user-attachments/assets/ebfccf3b-ea6d-49d8-90f7-3ee48ed31d5c)

 
