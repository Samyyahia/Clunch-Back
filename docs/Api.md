# Clunch API

### Login
-   Method: **POST**
-   Route: **/api/login_check**
-   Header: **Content-Type: application/json**
-   Body: `{"username":"username","password":"password"}`
-   Response: `{token: token}`

### Get User List
-   Method: **GET**
-   Route: **/api/users**
-   Authorization:
    -   Bearer Token: Token
-   Response: `{token: token}`

### Get Single User
-   Method: **GET**
-   Route: **/api/users/{id}**
-   Authorization:
    -   Bearer Token: Token
-   Response: `{token: token}`

### Get Category List
-   Method: **GET**
-   Route: **/api/categories**
-   Authorization:
    -   Bearer Token: Token
-   Response: 
```
[
    {
        "id": Integer,
        "name": String,
        "slug": String,
        "description": String
    },
    {...},
    {...}
]
```

### Get Single Category
-   Method: **GET**
-   Route: **/api/categories/{id}**
-   Authorization:
    -   Bearer Token: Token
-   Response: 
```
[
    "category": {
        "id": Integer,
        "name": String,
        "slug": String,
        "description": String
    },
    "recipies": [
        {
            "id": Integer,
            "title": String,
            "slug": String,
            "body": String,
            "duration": DateTime,
            "image": Media,
            "category": Category
            "ingredients": Array(Ingredient),
            "allergy": Array(Allergy),
            "tag": Array(Tag)
        },    
        {...},
        {...}
    ]
]
```

### Get Single Recipe
-   Method: **GET**
-   Route: **/api/recipes/{id}**
-   Authorization:
    -   Bearer Token: Token
-   Response: 
```
{
    "id": Integer,
    "title": String,
    "slug": String,
    "body": String,
    "duration": DateTime,
    "image": Media,
    "category": Category
    "ingredients": Array(Ingredient),
    "allergy": Array(Allergy),
    "tag": Array(Tag)
}
```

### Get Single Event
-   Method: **GET**
-   Route: **/api/events/{id}**
-   Authorization:
    -   Bearer Token: Token
-   Response: 
```
{
    "id": Integer,
    "recipe": String,
    "description": String,
    "quantity": Integer,
    "date": DateTime,
    "comments": Array(Comment),
    "user": User
    "participants": Array(User)
}
```

### Get User Company related Events
Permet de récupérer la liste de tous les evenements de la comapagnie de l'utilisateur courant
-   Method: **GET**
-   Route: **/api/events/{company_id}/company**
-   Authorization:
    -   Bearer Token: Token
-   Response: 
```
[
    {
        "id": Integer,
        "recipe": String,
        "description": String,
        "quantity": Integer,
        "date": DateTime,
        "comments": Array(Comment),
        "user": User
        "participants": Array(User)
    },
    {...},
    {...}
]
```

### Get User related Events
Permet de récupérer la liste de tous les evenements de l'utilisateur courant (inscrit + crée)
-   Method: **GET**
-   Route: **/api/events/{user_id}/user**
-   Authorization:
    -   Bearer Token: Token
-   Response: 
```
[
    {
        "id": Integer,
        "recipe": String,
        "description": String,
        "quantity": Integer,
        "date": DateTime,
        "comments": Array(Comment),
        "user": User
        "participants": Array(User)
    },
    {...},
    {...}
]
```

### Get Events By Date and Company
Permet de récupérer la liste de tous les evenements de la date courrente
-   Method: **GET**
-   Route: **/api/events/{company_id}/companies/{date}/date**
    - date au format : dd.MM.YYYY 
    - => Ex: 17.11.2019
    - /api/events/1/companies/17.11.2019/date
-   Authorization:
    -   Bearer Token: Token
-   Response: 
```
[
    {
        "id": Integer,
        "recipe": String,
        "description": String,
        "quantity": Integer,
        "date": DateTime,
        "comments": Array(Comment),
        "user": User
        "participants": Array(User)
    },
    {...},
    {...}
]
```

### Create an Event
-   Method: **POST**
-   Route: **/api/events/{user_id}/create**
-   Authorization:
    -   Bearer Token: Token
-   Parameters:
    -   recipe (String)
    -   date (String) => format: dd.MM.YYYY
    -   desc (String)
    -   quantity (String ou Int)
-   Response: **En fonction de ce qui est envoyé l'api retourne un code et un message différent**
```
[
    "code": Integer,
    "message": String
]
```

### Join an Event
-   Method: **POST**
-   Route: **/api/events/{event_id}/users/{user_id}/joins**
-   Authorization:
    -   Bearer Token: Token
-   Response: **En fonction de ce qui est envoyé l'api retourne un code et un message différent**
```
[
    "code": Integer,
    "message": String
]
```

### Leave an Event
-   Method: **POST**
-   Route: **/api/events/{event_id}/users/{user_id}/leaves**
-   Authorization:
    -   Bearer Token: Token
-   Response: **En fonction de ce qui est envoyé l'api retourne un code et un message différent**
```
[
    "code": Integer,
    "message": String
]
```

### Register to the newsletter
**Cette fonction ne sert qu'au front mais pas l'appli mobile**
-   Method: **POST**
-   Route: **/api/newsletters**
-   Authorization:
    -   Bearer Token: Token
-   Parameters:
    - mail (String)
    - phone (String)
    - agreement (String)
-   Response: **En fonction de ce qui est envoyé l'api retourne un code et un message différent**
```
{
    "code": Integer,
    "message": String
}
```
