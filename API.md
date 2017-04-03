# API Routes

### `POST` [/register](http://localhost/slim-rest-base/register)
##### AuthController:register
###### register

### `POST` [/login](http://localhost/slim-rest-base/login)
##### AuthController:login
###### login

### `POST` [/auth/refresh](http://localhost/slim-rest-base/auth/refresh)
##### AuthController:refresh
###### jwt.refresh

### `GET` [/users/me](http://localhost/slim-rest-base/users/me)
##### AuthController:me
###### users.me

### `GET` [/users](http://localhost/slim-rest-base/users)
##### UserController:getCollection
###### get_users

### `DELETE` [/users/{id:[0-9]+}](http://localhost/slim-rest-base/users/{id:[0-9]+})
##### UserController:delete
###### delete_user

### `PUT` [/users/{id:[0-9]+}/promote](http://localhost/slim-rest-base/users/{id:[0-9]+}/promote)
##### UserController:promote
###### promote_user

### `PUT` [/users/{id:[0-9]+}/demote](http://localhost/slim-rest-base/users/{id:[0-9]+}/demote)
##### UserController:demote
###### demote_user

### `GET` [/categories](http://localhost/slim-rest-base/categories)
##### CategoryController:getCollection
###### get_categories

### `GET` [/categories/{id:[0-9]+}](http://localhost/slim-rest-base/categories/{id:[0-9]+})
##### CategoryController:get
###### get_category

### `POST` [/categories](http://localhost/slim-rest-base/categories)
##### CategoryController:post
###### post_category

### `PUT` [/categories/{id:[0-9]+}](http://localhost/slim-rest-base/categories/{id:[0-9]+})
##### CategoryController:put
###### put_category

### `DELETE` [/categories/{id:[0-9]+}](http://localhost/slim-rest-base/categories/{id:[0-9]+})
##### CategoryController:delete
###### delete_category

### `GET` [/categories/{id:[0-9]+}/products](http://localhost/slim-rest-base/categories/{id:[0-9]+}/products)
##### CategoryController:getCategoryProducts
###### get_category_products

### `GET` [/products](http://localhost/slim-rest-base/products)
##### ProductController:getCollection
###### get_products

### `GET` [/products/{id:[0-9]+}](http://localhost/slim-rest-base/products/{id:[0-9]+})
##### ProductController:get
###### get_product

### `POST` [/products](http://localhost/slim-rest-base/products)
##### ProductController:post
###### post_product

### `PUT` [/products/{id:[0-9]+}](http://localhost/slim-rest-base/products/{id:[0-9]+})
##### ProductController:put
###### put_product

### `DELETE` [/products/{id:[0-9]+}](http://localhost/slim-rest-base/products/{id:[0-9]+})
##### ProductController:delete
###### delete_product

### `GET` [/items](http://localhost/slim-rest-base/items)
##### ItemController:getCollection
###### get_items

### `GET` [/items/{id:[0-9]+}](http://localhost/slim-rest-base/items/{id:[0-9]+})
##### ItemController:get
###### get_item

### `GET` [/items/barcode/{code:[0-9]+}](http://localhost/slim-rest-base/items/barcode/{code:[0-9]+})
##### ItemController:getByCode
###### get_item_code

### `POST` [/items](http://localhost/slim-rest-base/items)
##### ItemController:post
###### post_item

### `PUT` [/items/{id:[0-9]+}](http://localhost/slim-rest-base/items/{id:[0-9]+})
##### ItemController:put
###### put_item

### `DELETE` [/items/{id:[0-9]+}](http://localhost/slim-rest-base/items/{id:[0-9]+})
##### ItemController:delete
###### delete_item

### `GET` [/locations](http://localhost/slim-rest-base/locations)
##### LocationController:getCollection
###### get_locations

### `GET` [/locations/{id:[0-9]+}](http://localhost/slim-rest-base/locations/{id:[0-9]+})
##### LocationController:get
###### get_location

### `POST` [/locations](http://localhost/slim-rest-base/locations)
##### LocationController:post
###### post_location

### `PUT` [/locations/{id:[0-9]+}](http://localhost/slim-rest-base/locations/{id:[0-9]+})
##### LocationController:put
###### put_location

### `DELETE` [/locations/{id:[0-9]+}](http://localhost/slim-rest-base/locations/{id:[0-9]+})
##### LocationController:delete
###### delete_location

### `PUT` [/locations/activation/{id:[0-9]+}](http://localhost/slim-rest-base/locations/activation/{id:[0-9]+})
##### LocationController:activate
###### activate_location

### `GET` [/locations/{id:[0-9]+}/items](http://localhost/slim-rest-base/locations/{id:[0-9]+}/items)
##### LocationController:getItemsLocation
###### get_items_location

### `GET` [/clients](http://localhost/slim-rest-base/clients)
##### ClientController:getCollection
###### get_clients

### `GET` [/clients/{id:[0-9]+}](http://localhost/slim-rest-base/clients/{id:[0-9]+})
##### ClientController:get
###### get_client

### `POST` [/clients](http://localhost/slim-rest-base/clients)
##### ClientController:post
###### post_client

### `PUT` [/clients/{id:[0-9]+}](http://localhost/slim-rest-base/clients/{id:[0-9]+})
##### ClientController:put
###### put_client

### `DELETE` [/clients/{id:[0-9]+}](http://localhost/slim-rest-base/clients/{id:[0-9]+})
##### ClientController:delete
###### delete_client

### `GET` [/flows](http://localhost/slim-rest-base/flows)
##### FlowController:getCollection
###### get_flows

### `GET` [/flows/{id:[0-9]+}](http://localhost/slim-rest-base/flows/{id:[0-9]+})
##### FlowController:get
###### get_flow

### `POST` [/flows](http://localhost/slim-rest-base/flows)
##### FlowController:post
###### post_flow

### `PUT` [/flows/{id:[0-9]+}](http://localhost/slim-rest-base/flows/{id:[0-9]+})
##### FlowController:put
###### put_flow

### `DELETE` [/flows/{id:[0-9]+}](http://localhost/slim-rest-base/flows/{id:[0-9]+})
##### FlowController:delete
###### delete_flow

