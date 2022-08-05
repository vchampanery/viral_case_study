# REST API Case study task

## Run the tests

    ./vendor/bin/phpunit

# REST API

The REST API to the case study app is described below.

## login user API

### Request

`POST /ctest_sm/public/api/register`

    curl -X POST http://localhost/ctest_sm/public/api/register -H 'cache-control: no-cache' -H 'content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW'   -H 'postman-token: 57c9a7a2-7adb-360f-90d4-b3fa0eab0f81' -F name=viral3   -F email=viral3@gmail.com -F password=password

### Response

    HTTP/1.1 200 OK
    Date: Thu, 24 Feb 2011 12:36:30 GMT
    Status: 200 OK
    Connection: close
    Content-Type: application/json
    Content-Length: 2

    {
    "success": true,
    "message": "user registered successfully.",
    "data": {
        "token": "5|vpxfI4hnYVke7WvjAu86OJd4wtguU4JrAU0wIttp",
        "user": {
            "name": "viral3",
            "email": "viral3@gmail.com",
            "updated_at": "2022-08-05T19:21:52.000000Z",
            "created_at": "2022-08-05T19:21:52.000000Z",
            "id": 6
        }
    }
}

## Login user

### Request

`POST /ctest_sm/public/api/login`

    curl -X POST http://localhost/ctest_sm/public/api/login  -H 'cache-control: no-cache' -H 'content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW' -H 'postman-token: e06f6793-517e-fcea-f7cc-724d482900c4'-F email=viral2@gmail.com -F password=password

### Response

    HTTP/1.1 201 Created
    Date: Thu, 24 Feb 2011 12:36:30 GMT
    Status: 201 Created
    Connection: close
    Content-Type: application/json
    Location: /thing/1
    Content-Length: 36

    {
    "success": true,
    "message": "user successfully logged in",
    "data": {
        "user": {
            "id": 5,
            "name": "viral2",
            "email": "viral2@gmail.com",
            "email_verified_at": null,
            "created_at": "2022-08-05T19:20:13.000000Z",
            "updated_at": "2022-08-05T19:20:13.000000Z"
        },
        "token": "6|jaZDOJQyG20xsDQ7PaZC8phWywE6J8C7b7SKyu1C"
    }
}

## Add Product

### Request

`POST /ctest_sm/public/api/products`

    curl -X POST  http://localhost/ctest_sm/public/api/products   -H 'authorization: Bearer 1|3P3YRcKMc24FP688kq4uZB30I3O6E2xLh6LrfWwE'   -H 'cache-control: no-cache'   -H 'content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW'   -H 'postman-token: 4d13ee2e-2a68-4e72-f60e-f447203f68ad'  -F User=1   -F Name=123  -F Price=12   -F Category=1  -F Description=123  -F Avatar=@degree_certificate.jpg

### Response

    HTTP/1.1 200 OK
    Date: Thu, 24 Feb 2011 12:36:30 GMT
    Status: 200 OK
    Connection: close
    Content-Type: application/json
    Content-Length: 36

    {
    "success": true,
    "message": "Product stored Successfully",
    "data": {
        "User": "1",
        "Name": "123",
        "Price": "12",
        "Category": "1",
        "Description": "123",
        "Avatar": {},
        "updated_at": "2022-08-05T22:01:58.000000Z",
        "created_at": "2022-08-05T22:01:58.000000Z",
        "id": 6
    }
}

## Get Add Products

### Request

`GET http://localhost/ctest_sm/public/api/products`

    curl -X GET   http://localhost/ctest_sm/public/api/products   -H 'authorization: Bearer 1|3P3YRcKMc24FP688kq4uZB30I3O6E2xLh6LrfWwE'  -H 'cache-control: no-cache'   -H 'content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW'  -H 'postman-token: b93bb53d-0dcf-c9b8-7a6b-b8b2cce06e12'

### Response

    HTTP/1.1 404 Not Found
    Date: Thu, 24 Feb 2011 12:36:30 GMT
    Status: 200 OK
    Connection: close
    Content-Type: application/json
    Content-Length: 35

    [
    {
        "id": 1,
        "User": 1,
        "Name": "product name",
        "Price": 10,
        "Category": 1,
        "Description": "",
        "Avatar": "12",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 2,
        "User": 1,
        "Name": "P1",
        "Price": 12,
        "Category": 1,
        "Description": "1212sadadfadfa asdfasdfsdf",
        "Avatar": "C:\\xampp81\\tmp\\php31F3.tmp",
        "created_at": "2022-08-04T18:22:01.000000Z",
        "updated_at": "2022-08-04T18:22:01.000000Z"
    }
]

## Get Single product in detail

### Request

`POST http://localhost/ctest_sm/public/api/products/1`

    curl -X POST   http://localhost/ctest_sm/public/api/products/1    -H 'authorization: Bearer 1|3P3YRcKMc24FP688kq4uZB30I3O6E2xLh6LrfWwE'    -H 'cache-control: no-cache'    -H 'content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW'   -H 'postman-token: b3ae3735-2670-e2a6-d30f-bedf602d4a7f'

### Response

    HTTP/1.1 201 Created
    Date: Thu, 24 Feb 2011 12:36:31 GMT
    Status: 200 OK
    Connection: close
    Content-Type: application/json
    Location: /thing/2
    Content-Length: 35

    {
    "success": true,
    "message": "Product data fetched Successfully",
    "data": null
    }

## Delete Single product

### Request

`DELETE http://localhost/ctest_sm/public/api/products/1 `

    curl -X DELETE  http://localhost/ctest_sm/public/api/products/1   -H 'authorization: Bearer 1|3P3YRcKMc24FP688kq4uZB30I3O6E2xLh6LrfWwE'  -H 'cache-control: no-cache'  -H 'content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW'  -H 'postman-token: bdfb9006-9a34-7899-f045-43e1457f16a0'

### Response

    HTTP/1.1 201 Created
    Date: Thu, 24 Feb 2011 12:36:31 GMT
    Status: 200 OK
    Connection: close
    Content-Type: application/json
    Location: /thing/2
    Content-Length: 35

    {
    "success": true,
    "message": "Product deleted Successfully"
     }

## Add  Cart     Item

### Request

`POST http://localhost/ctest_sm/public/api/cart `

    curl -X POST   http://localhost/ctest_sm/public/api/cart   -H 'authorization: Bearer 1|3P3YRcKMc24FP688kq4uZB30I3O6E2xLh6LrfWwE'   -H 'cache-control: no-cache'   -H 'content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW'  -H 'postman-token: 95ef87cb-7245-12e1-bcaa-362bde9cffb8'  -F session_id=huFQjTagMJFiCcncDBCEDXvjSQtNOGtqabhUZaVv   -F user_id=2   -F product_id=1   -F qty=112   -F 'Description=1212sadadfadfa asdfasdfsdf'

### Response

    HTTP/1.1 201 Created
    Date: Thu, 24 Feb 2011 12:36:31 GMT
    Status: 200 OK
    Connection: close
    Content-Type: application/json
    Location: /thing/2
    Content-Length: 35

    {
    "success": true,
    "message": "Cart Item added Successfully",
    "data": {
        "session_id": "huFQjTagMJFiCcncDBCEDXvjSQtNOGtqabhUZaVv",
        "user_id": "2",
        "product_id": "1",
        "qty": "112",
        "updated_at": "2022-08-05T23:14:00.000000Z",
        "created_at": "2022-08-05T23:14:00.000000Z",
        "id": 3
    }
    }

## Update Cart Item

### Request

`POST http://localhost/ctest_sm/public/api/cart/1`

    curl -X PUT  http://localhost/ctest_sm/public/api/cart/1   -H 'authorization: Bearer 1|3P3YRcKMc24FP688kq4uZB30I3O6E2xLh6LrfWwE'  -H 'cache-control: no-cache'   -H 'content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW'   -H 'postman-token: f4c45ea3-70f4-1386-7d0e-3bdad214f890'   -F session_id=huFQjTagMJFiCcncDBCEDXvjSQtNOGtqabhUZaVv   -F user_id=2   -F product_id=1   -F qty=12   -F 'Description=1212sadadfadfa asdfasdfsdf'   -F Avatar=undefined

### Response

    HTTP/1.1 201 Created
    Date: Thu, 24 Feb 2011 12:36:31 GMT
    Status: 200 OK
    Connection: close
    Content-Type: application/json
    Location: /thing/2
    Content-Length: 35

    {
    "success": true,
    "message": "cart item updated Successfully",
    "data": {
        "id": 3,
        "session_id": "huFQjTagMJFiCcncDBCEDXvjSQtNOGtqabhUZaVv",
        "user_id": 2,
        "product_id": 1,
        "qty": 112,
        "created_at": "2022-08-05T23:14:00.000000Z",
        "updated_at": "2022-08-05T23:14:00.000000Z"
    }
    }

## Delete Cart Item

### Request

`DELETE http://localhost/ctest_sm/public/api/cart/1`

    curl -X DELETE   http://localhost/ctest_sm/public/api/cart/1   -H 'authorization: Bearer 1|3P3YRcKMc24FP688kq4uZB30I3O6E2xLh6LrfWwE'   -H 'cache-control: no-cache'   -H 'content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW'  -H 'postman-token: 12adbb78-a093-685b-9f51-7f67e1f2bf69'

### Response

    HTTP/1.1 201 Created
    Date: Thu, 24 Feb 2011 12:36:31 GMT
    Status: 200 OK
    Connection: close
    Content-Type: application/json
    Location: /thing/2
    Content-Length: 35

    {
    "success": true,
    "message": "cart item deleted Successfully"
    }
    
## Get All Cart Items

### Request

`GET http://localhost/ctest_sm/public/api/cart`

    curl -X GET  http://localhost/ctest_sm/public/api/cart   -H 'authorization: Bearer 1|3P3YRcKMc24FP688kq4uZB30I3O6E2xLh6LrfWwE'   -H 'cache-control: no-cache'   -H 'content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW'   -H 'postman-token: 208b321a-a57d-1dd7-9428-9b1a68d6ade2'

### Response

    HTTP/1.1 201 Created
    Date: Thu, 24 Feb 2011 12:36:31 GMT
    Status: 200 OK
    Connection: close
    Content-Type: application/json
    Location: /thing/2
    Content-Length: 35

    {
    "success": true,
    "message": "All Cart items fetch Successfully",
    "data": [
        {
            "id": 2,
            "session_id": "huFQjTagMJFiCcncDBCEDXvjSQtNOGtqabhUZaVv",
            "user_id": 2,
            "product_id": 1,
            "qty": 112,
            "created_at": "2022-08-04T18:44:05.000000Z",
            "updated_at": "2022-08-04T18:44:05.000000Z"
        },
        {
            "id": 3,
            "session_id": "huFQjTagMJFiCcncDBCEDXvjSQtNOGtqabhUZaVv",
            "user_id": 2,
            "product_id": 1,
            "qty": 112,
            "created_at": "2022-08-05T23:14:00.000000Z",
            "updated_at": "2022-08-05T23:14:00.000000Z"
        }
    ]
    }
    



