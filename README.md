# Entities and Relationships

## User
Attributes: id, name, email, password, created_at, updated_at
Description: Stores registered user details who can place orders.
Relationships: Has many Orders

## Product
Attributes: id, name, description, price, stock_quantity, created_at, updated_at
Description: Represents products available for sale with current price and stock quantity.
Relationships: Belongs to many Orders through OrderProduct

## Order
Attributes: id, user_id, total_price, created_at, updated_at
Description: Stores information about orders placed by users, including the total price.
Relationships: Belongs to a User, has many OrderProduct entries, and thus many Products through OrderProduct

## OrderProduct
Attributes: id, order_id, product_id, quantity, price_at_purchase
Description: Stores individual product details within an order, preserving the price of each product at the time of purchase.
Relationships: Belongs to an Order and a Product
