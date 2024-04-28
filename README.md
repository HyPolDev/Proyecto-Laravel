# Lara Games Project
The first goal of this project is to create an LFG web application, backend for now, that allows employees to contact other colleagues to form groups to play a video game, with the aim of being able to share some leisure time after work.
The project will be made using the Laravel framework and a SQL database
<p align="center">
<img  width="300" height="400" src="./img/Ilustration.jpg" alt="Lara games Img"></p>


## 🛠️ Tech&Tolls used 
<p align="center">
<img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white"><img src="https://img.shields.io/badge/GIT-E44C30?style=for-the-badge&logo=git&logoColor=white"><img src="https://img.shields.io/badge/JWT-000000?style=for-the-badge&logo=JSON%20web%20tokens&logoColor=white"><img src="https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white">
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="200" alt="Laravel Logo"></a></p>
</p>

##  ⚙️ Endpoints

***All endpoints start with /api/***
<br>
Example

    Post server.ip/api/register

<details>
<summary>🟢Auth</summary>

<details>
<summary> User Registration</summary>

-   Register new user
    
    Registers a new user. The username and email must be unique.

        POST /register

    Body:
    
    ```json
    {
        "userName": "User",
        "email": "user@adress.com",
        "password": "password"
    }
    ```
</details>

<details>
<summary> User Login</summary>

-   Logs a user in


        POST /register

    Body:
    
    ```json
    {
        
        "email": "user@adress.com",
        "password": "password"
    }
    ```

</details>

<details>
<summary> User Logout </summary>

-   Logs out the user


        DELETE /logout

</details>

</details>

<details>
<summary>🟢Users</summary>

<details>
<summary>User Management</summary>

-   Retrieve active usernames
    
    Retrieves active usernames. Default page is 5 and default page size is 5. If the user is an admin, retrieves all usernames.

        GET /user
        
    Parameters:
    
    -   `pageSize`: Number of usernames per page (optional | default : 5)

</details>

<details>
<summary> Get self Profile</summary>

-   Retrieves self profile

        GET /user/profile

</details>

<details>
<summary> Update Profile</summary>

-   Logs a user in


        PUT /user/profile

    Body:
    
    ```json
    {
        
        "userName": "user"
    }
    ```

</details>

<details>
<summary>Delete User</summary>

-   Deletes User

        DELETE /user/{id}
        
    Parameters:
    
    -   `id`: userId

</details>
</details>

<details>
<summary>🟢Chats</summary>

<details>
<summary> Create Chat</summary>

-   Creates new Chat
    
        POST /chat

    Body:
    
    ```json
    {
        "name": "Chat Name",
        "description": "Chat description",
        "game_id": "12345678"
    }
    ```
</details>

<details>
<summary> Get all chats </summary>

-   Retrieves all chats

        GET /chat

</details>

<details>
<summary> Get Chat by id  </summary>

-   Retrieves Chat on params id

        GET /chat/{id}
        
    Parameters:
    
    -   `id`: chat Id

</details>

<details>
<summary> Delete Chat </summary>

-   Deletes chat on params id


        DELETE /chat/{id}

        Parameters:
    
    -   `id`: chat Id

</details>

<details>
<summary> Search chats by game </summary>

-   Retrieves chats from a game


        GET /chat/game/{id}

        Parameters:
    
    -   `id`: game Id

</details>

<details>
<summary>Enter a chat</summary>

-   Enters chat on params
    
        POST /user_chats

    Body:
    
    ```json
    {
        "chat_id": "2345678"
    }
    ```
</details>

<details>
<summary>Leave a chat</summary>

-   Leave Chat on body
    
        Detele /user_chats

    Body:
    
    ```json
    {
        "chat_id": "2345678"
    }
    ```
</details>
</details>

<details>
<summary>🟢Messages</summary>

<details>
<summary> Create Message in chat</summary>

-   Creates message in chat given by id on body


        POST /chat/message

    Body:
    
    ```json
    {
        "text": "Example Text",
    }
    ```

</details>

<details>
<summary> Update Message in chat</summary>

-   Updates message in chat given by id on body


        POST /chat/message/{id}
        
      Parameters:
    
    -   `id`: game Id


    Body:
    
    ```json
    {
        
        "text": "Example Text",
        "chat_id": "12345678"
    }
    ```

</details>

<details>
<summary> Delete Message in chat</summary>

-   Creates message in chat given by id on params


        DELETE /chat/message/{id}
        
      Parameters:
    
    -   `id`: message Id


</details>

<details>
<summary> Get messages from chat </summary>

-   Retrieves chats from a game


        GET /messages/{id}

        Parameters:
    
    -   `id`: game Id

</details>

</details>

<details>
<summary>🟢Games</summary>

<details>
<summary> Get all games</summary>

-   Retrieves all games

        GET /game

</details>


<details>
<summary>Create Game </summary>

-   Registers a game in the database 


        POST /game 

    Body:
    
    ```json
    {
        
        "gameName": "Your favourite RPG",
        "description": "Brief description",
        "urlImg": "https//:gameImage.net"
    }
    ```

</details>

<details>
<summary> Delete Game</summary>

-   Deletes game by id given on params


        DELETE /game/{id}
        
      Parameters:
    
    -   `id`: game Id

</details>

<details>
<summary> Update Game</summary>


-   Updates Game by id given on params


        PUT /game/{id}
        
      Parameters:
    
    -   `id`: game Id


    Body:
    
    ```json
    {
        "gameName": "Your favourite RPG",
        "description": "Brief description",
        "urlImg": "https//:gameImage.net"
    }
    ```

</details>

</details>

## ✒️ The team

- **Marina Escrivá** - ***Project Developer & Designer***
  - [marinaescriva](https://github.com/marinaescriva) 
- **Pol Montero** - ***Project Developer & Documentarian***
  - [HyPolDev](https://github.com/hypoldev) 
- **Ana Pacheco** - ***Project Developer & Tester***
  - [aipacheco](https://github.com/aipacheco) 
- **Ramiro Poblete** - ***Project Developer & Pagination Manager*** 
  - [Ramer8](https://github.com/ramer8) 

## 🎓 Special Thanks

- To **Geekshubs Academy** for the trust, encouragement and knowledges to make us able to colaborate and develop this project


## ☑️ Add Ons - Bugs and Dreams

- To this date there is no pagination for most *GET* endpoints

## 📄 License 

This project is under a MIT license. Check out the  `LICENSE` file for more and extended details about it.