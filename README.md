## Rest API приложение для управления списком задач.

### Функционал приложения:

1. Создание задачи.

2. Просмотр списка задач:

    - Возможность поиска по названию.
    - Сортировка по дате выполнения/создания.
    - Пагинация.

3. Просмотр определенной задачи.

4. Редактирование задачи.

5. Удаление задачи.

### Пример структуры методов API

#### 1. Создание задачами

POST /api/tasks

Тело запроса:

    { 
        "title": "Task 1",
        "description": "Task 1 description",
        "due_date": "2025-01-20T15:00:00",
        "create_date": "2025-01-20T15:00:00",
        "priority": "high",
        "category": "Work",
        "status": "not completed"
    }

Ответ:

    {
        {
            "data": {
                "id": 1,
                "title": "Task 1",
                "description": "Task 1 description",
                "due_date": "2025-01-20T15:00:00",
                "create_date": "2025-01-20T15:00:00",
                "status": "not completed",
                "priority": "high",
                "category": "Work"
            }
        }
    }

#### 2. Просмотр списка задач
 
GET /api/tasks  
Параметры запроса (опционально):
-   search: поиск по названию.
-   sort: due_date, created_date.
-   page: страница поиска.
-   per_page: количество задач на странице.

Пример запроса:  

        /api/tasks?search=Task&per_page=2

Ответ:

    {
        {
            "data": [
                {
                    "id": 1,
                    "title": "Task 1",
                    "description": "Task 1 description",
                    "due_date": "2025-01-20T15:00:00",
                    "create_date": "2025-01-20T15:00:00",
                    "status": "not completed",
                    "priority": "high",
                    "category": "Work"
                },
                {
                    "id": 501,
                    "title": "Task 501",
                    "description": "Task 501 description",
                    "due_date": "2025-01-20T15:00:00",
                    "create_date": "2025-01-20T15:00:00",
                    "status": "completed",
                    "priority": "low",
                    "category": "Rest"
                }
            ]
        }
    }

#### 3. Просмотр определенной задачи

GET /api/tasks/{id}  

Ответ:

    {
        {
            "data": {
                "id": 1,
                "title": "Task 1",
                "description": "Task 1 description",
                "due_date": "2025-01-20T15:00:00",
                "create_date": "2025-01-20T15:00:00",
                "status": "not completed",
                "priority": "high",
                "category": "Work"
            }
        }
    }

#### 4. Редактирование задачи

PUT /api/tasks/{id}

Тело запроса:

    {
        "title": "New Task title",
    }

Ответ:

    {
        {
            "data": {
                "id": 1,
                "title": "New Task title",
                "description": "Task 1 description",
                "due_date": "2025-01-20T15:00:00",
                "create_date": "2025-01-20T15:00:00",
                "status": "not completed",
                "priority": "high",
                "category": "Work"
            }
        }
    }

#### 5. Удаление задачи

DELETE /api/tasks/{id}  

Ответ:

    {
        "message": "Task deleted successfully"
    }

### Запуск интеграционных тестов:

    php artisan test
