# api-test

- Setup & Running instruction:
  - Setup server & database of your choice
  - Use git to deploy code
  
    Run from command line:

    ```
    git clone https://github.com/TranAnhDuc/api-test.git
    ```
  - Get vendor libraries
    
    Run from command line: 
    
    ```
    composer install
    ```
  - Add .evn file
    - Modify from .env.example
    - Set correct database connection
  - Create database structure and seed data
    
    Run from command line:
    
    ```
    php artisan migrate:fresh --seed
    ```
- Test instruction:

  Use Curl command, replace the variables inside angle bracket (such as `<hosted-domain>`, `<id>`, `<ids>`) to execute and check results.

  - View All Users:
  ```
  curl -X GET -H 'Content-Type: application/json' -i 'http://<hosted-domain>/user'
  ```
  - Create a new user:
  ```
  curl -X POST -H 'Content-Type: application/json' -i '<hosted-domain>/user' --data '{"name":"test5","email":"test6@api-test.test","role_id":1,"password":"ABCDEFGH"}'
  ```
  - Delete single user:
  ```
  curl -X DELETE -H 'Content-Type: application/json' -i 'http://api-test.test/user/<id>'
  ```
  - Batch delete users (replaces `<ids>` with list of comma separated ids to be deleted):
  ```
  curl -X POST -H 'Content-Type: application/json' -i 'http://api-test.test/user:batchDelete' --data '{"ids":[<ids>]}'
  ```
  - Update user profile (including assigning roles to the user):
  ```
  curl -X PUT -H 'Content-Type: application/json' -i '`<hosted-domain>`/user/`<id>`' --data '{"name":"test5","email":"test6@api-test.test","role_id":1,"password":"ABCDEFGH"}'
  ```
  - View user’s details (including assigned roles):
  ```
  curl -X GET -H 'Content-Type: application/json' -i 'http://<hosted-domain>/user/<id>
  ```