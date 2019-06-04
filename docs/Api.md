# Clunch API

### Email Check
-   Method: **POST**
-   Route: **/api/users/checks**
-   Body:
    -   email (String)
-   Response: **En fonction de ce qui est envoyé l'api retourne un code et un message différent**
    - Renvoit un code 200 si il y a bien un utilisateur a cet email  
```
{
    "code": Integer,
    "message": String
}
```

### Login
-   Method: **POST**
-   Route: **/api/login**
-   Header: **Content-Type: application/json**
-   Body: `{"email":"email","password":"password"}`
-   Response: 
```
{
    "token": token,
    "user": {
        "id": Integer,
        "username": String,
        "usernameCanonical": String,
        "email": String,
        "emailCanonical": String,
        "enabled": true,
        "password": String(hash),
        "lastLogin": DateTme,
        "groups": Array,
        "roles": Array,
        "company": {
            "id": Integer,
            "name": String,
            "token": String,
            "users": Array
        }
        "allergy": Array,
        "comments": Array
    }
}
```

### Get User List
-   Method: **GET**
-   Route: **/api/users**
-   Authorization:
    -   Bearer Token: **{Token)**
-   Response: 
``` 
[
    {
        "id": Integer,
        "username": String,
        "usernameCanonical": String,
        "email": String,
        "emailCanonical": String,
        "enabled": true,
        "password": String(hash),
        "lastLogin": DateTme,
        "groups": Array,
        "roles": Array,
        "picture": String,
        "company": {
            "id": Integer,
            "name": String,
            "token": String,
            "users": Array
        }
        "allergy": Array,
        "comments": Array
    }
]
```

### Get Single User
-   Method: **GET**
-   Route: **/api/user/{id}**
-   Authorization:
    -   Bearer Token: **{Token)**
-   Response: 
```
{
    "id": Integer,
    "username": String,
    "usernameCanonical": String,
    "email": String,
    "emailCanonical": String,
    "enabled": true,
    "password": String(hash),
    "lastLogin": DateTme,
    "groups": Array,
    "roles": Array,
    "picture": String,
    "company": {
        "id": Integer,
        "name": String,
        "token": String,
        "users": Array
    }
    "allergy": Array,
    "comments": Array
}
```

### Get Category List
-   Method: **GET**
-   Route: **/api/categories**
-   Authorization:
    -   Bearer Token: **{Token)**
-   Response: 
```
[
    {
        "id": Integer,
        "name": String,
        "slug": String,
        "description": String
        "image": String
    },
    {...},
    {...}
]
```

### Get Single Category Recipe List
-   Method: **GET**
-   Route: **/api/categories/{id}/recipes**
-   Authorization:
    -   Bearer Token: **{Token)**
-   Response: 
```
[
    {
        "id": Integer,
        "title": String,
        "slug": String,
        "body": String,
        "duration": DateTime,
        "image": String,
        "category": Category
        "ingredients": Array(Ingredient),
        "allergy": Array(Allergy),
        "tag": Array(Tag)
    },    
    {...},
    {...}
]
```

### Get Single Recipe
-   Method: **GET**
-   Route: **/api/recipe/{id}**
-   Authorization:
    -   Bearer Token: **{Token)**
-   Response: 
```
{
    "id": Integer,
    "title": String,
    "slug": String,
    "body": String,
    "duration": DateTime,
    "image": String,
    "category": Category
    "ingredients": Array(Ingredient),
    "allergy": Array(Allergy),
    "tag": Array(Tag),
    "date": DateTime
}
```

### Get Single Event
-   Method: **GET**
-   Route: **/api/event/{id}**
-   Authorization:
    -   Bearer Token: **{Token)**
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
    "participants": Array(User),
    "limitDate": DateTime
}
```

### Get User Company related Events
Permet de récupérer la liste de tous les evenements de la comapagnie de l'utilisateur courant
-   Method: **GET**
-   Route: **/api/company/{company_id}/events**
-   Authorization:
    -   Bearer Token: **{Token)**
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
        "participants": Array(User),
        "limitDate": DateTime
    },
    {...},
    {...}
]
```

### Get User related Events
Permet de récupérer la liste de tous les evenements de l'utilisateur courant (inscrit + crée)
-   Method: **GET**
-   Route: **/api/user/{user_id}/events**
-   Authorization:
    -   Bearer Token: **{Token)**
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
        "participants": Array(User),
        "limitDate": DateTime
    },
    {...},
    {...}
]
```

### Get User Participating Events
Permet de récupérer la liste de tous les evenements où l'utilisateur courant est inscrit
-   Method: **GET**
-   Route: **/api/user/{user}/events/participating**
-   Authorization:
    -   Bearer Token: **{Token)**
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
        "participants": Array(User),
        "limitDate": DateTime
    },
    {...},
    {...}
]
```

### Get User Created Events
Permet de récupérer la liste de tous les evenements que l'utilisateur courant à créer
-   Method: **GET**
-   Route: **/api/user/{user}/events/created**
-   Authorization:
    -   Bearer Token: **{Token)**
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
        "participants": Array(User),
        "limitDate": DateTime
    },
    {...},
    {...}
]
```

### Get Events By Date and Company
Permet de récupérer la liste de tous les evenements de la date courrente
-   Method: **GET**
-   Route: **/api/company/{company_id}/date/{date}/events**
    - date au format : dd.MM.YYYY 
    - => Ex: 17.11.2019
    - /api/events/1/companies/17.11.2019/date
-   Authorization:
    -   Bearer Token: **{Token)**
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
        "participants": Array(User),
        "limitDate": DateTime
    },
    {...},
    {...}
]
```

### Create an Event
-   Method: **POST**
-   Route: **/api/user/{user_id}/event/create**
-   Authorization:
    -   Bearer Token: **{Token)**
-   Body:
    -   recipe (String)
    -   date (String) => format: dd.MM.YYYY
    -   limitDate (String) => format: dd.MM.YYYY
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
-   Route: **/api/user/{user_id}/event/{event_id}/join**
-   Authorization:
    -   Bearer Token: **{Token)**
-   Response: **En fonction de ce qui est envoyé l'api retourne un code et un message différent**
```
[
    "code": Integer,
    "message": String
]
```

### Leave an Event
-   Method: **POST**
-   Route: **/api/user/{user_id}/event/{event_id}/leave**
-   Authorization:
    -   Bearer Token: **{Token)**
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
-   Route: **/api/newsletter**
-   Authorization:
    -   Bearer Token: Token
-   Body:
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
