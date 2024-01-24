### Инструкция по развертыванию локально:

#### Для локальной разработки используется оболочка Laravel Sail.

#### Чтобы развернуть проект локально, выполните следующие шаги:

- Склонируйте проект: `git clone https://github.com/064Pavel/AutoAssignManager AutoAssignManager`
- Перейдите в корневую папку проекта: `cd AutoAssignManager`
- Запустите контейнеры Docker с помощью команды: `./vendor/bin/sail up -d --build`
- Выполните миграции базы данных и заполните ее тестовыми данными с помощью команды: `./vendor/bin/sail artisan migrate:fresh --seed`

### Endpoint:

`http://localhost/api/available-cars/{employeeId}/{startTime}/{endTime}/{model?}/{comfortCategory?}` 

- employeeId id сотрудника от 1 до 10
- start_time время начала поездки
- end_time время конца поездки
- model (опционально) модель автомобиля
- comfort_category (опционально) категория комфорта (Standard, Comfort, Premium)

### Пример:

`http://localhost/api/available-cars/2/2022-01-24%2010:00:00/2022-01-24%2018:00:00`

### Ответ:

```yaml
{
    "data": [
        {

            }
    ]
}

```

