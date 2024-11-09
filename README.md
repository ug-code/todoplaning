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
view => 
http://127.0.0.1:3000/todo/1  first mockup
http://127.0.0.1:3000/todo/2  second mockup
json => 

http://127.0.0.1:3000/api/v1/taskList/1
http://127.0.0.1:3000/api/v1/taskList/1
```


response json

```shell
{"data":{"totalEstimatedduration":38,"schedule":[{"period":"1 week","developers":{"DEV5":{"info":{"totalTask":8,"totalHour":38},"planning":[{"id":13,"level":5,"estimated_duration":8,"name":"Job Id 5"},{"id":12,"level":4,"estimated_duration":7,"name":"Job Id 4"},{"id":15,"level":3,"estimated_duration":6,"name":"Job Id 7"},{"id":9,"level":3,"estimated_duration":5,"name":"Job Id 1"},{"id":14,"level":2,"estimated_duration":4,"name":"Job Id 6"},{"id":10,"level":2,"estimated_duration":3,"name":"Job Id 2"},{"id":16,"level":1,"estimated_duration":3,"name":"Job Id 8"},{"id":11,"level":1,"estimated_duration":2,"name":"Job Id 3"}]},"DEV4":{"info":{"totalTask":0,"totalHour":0},"planning":[]},"DEV3":{"info":{"totalTask":0,"totalHour":0},"planning":[]},"DEV2":{"info":{"totalTask":0,"totalHour":0},"planning":[]},"DEV1":{"info":{"totalTask":0,"totalHour":0},"planning":[]}}}]}}
```

![image](https://github.com/user-attachments/assets/7fb25b33-4a47-43b1-a265-0b725c9fefef)

![image](https://github.com/user-attachments/assets/53837918-b7d2-4ae0-8fbd-c17e1f71d147)
![image](https://github.com/user-attachments/assets/d1fc7c8f-0d5d-498c-ad1e-f3d00c0d8347)

 
