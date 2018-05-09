# Project 4
+ By: *Bryan Wilks*
+ Production URL: <http://p4.bryanwilksharvard.club>

## Database
*The following is example info taken from Foobooks; delete and replace with your own info.*

Primary tables:
  + `products`
  + `statuses`
  + `users`
  
Pivot table(s):
  + `product_status`


## CRUD
*After logging in at <http://p4.bryanwilksharvard.club> with the seeded logins (jill@harvard.edu or jamal@harvard.edu), these 4 CRUD operations can be viewed:

__Create__
  + Visit <http://p4.bryanwilksharvard.club/product-add>
  + Fill out form
  + Click *Add product*
  + Observe confirmation message
  
__Read__
  + Visit <http://p4.bryanwilksharvard.club/products> and Click *Search* to see a listing of all products by product type
  + Visit <http://p4.bryanwilksharvard.club/status-center> and Click *Search* to see a listing of all products with statuses by product type
  + Visit <http://p4.bryanwilksharvard.club/dashboard> to see a listing of the most recently updated/added products and to see quickview statistics.
  
__Update__
  + Visit <http://p4.bryanwilksharvard.club/products> and Click *Search* to see a listing of all products by product type, or visit <http://p4.bryanwilksharvard.club/status-center> and Click *Search* to see a listing of all products with statuses by product type 
  + choose the Edit action at the end of one of the product results
  + Make some edit to form
  + Click *Edit Product*
  + Observe confirmation message
  
__Delete__
  + Visit <http://p4.bryanwilksharvard.club/products> and Click *Search* to see a listing of all products by product type
  + choose the 'X' at the end of one of the product results, meaning delete
  + Confirm deletion
  + Observe confirmation message

## Outside resources
  + Login Modal reference: <https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_login_form_modal>
  + Foobooks reference: <https://github.com/susanBuck/foobooks>
  + Modal functionality: <https://w3schools.com/bootstrap/bootstrap_modal.asp>
  + Responsive Navigation Menu reference and style help: <https://bootsnipp.com/snippets/featured/responsive-navigation-menu>
  + Modal data-passing reference: <https://stackoverflow.com/questions/27027186/php-how-to-put-and-pass-variable-in-modal-url>
  

## Code style divergences
*Followed PSR-1/PSR-2 and course guidelines on code style to the best of my ability, trying to be meticulous about syntax and design decisions. Any minor divergences were meant to help the specific section for readability/usability.*

## Notes for instructor
 + The CG portal itself features a product listing system with quick view data on statuses of products. The functionality of the portal lies inits ability to quickly show products based on a number of selected criteria, and also to be able to apply status codes to products for users to be able to keep track of product statuses and apply maintenance/update products when necessary.
 + The CG_Player_logo.png refuses to load in the production environment, even though it loads in development and it is in the Github repository and on my production server. It is by no means a crucial piece and it just aesthetic, but spent way too long trying to debug it with no avail.